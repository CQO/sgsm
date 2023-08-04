<?php


/**
 * Medoo Database Framework.
 *
 * The Lightweight PHP Database Framework to Accelerate Development.
 *
 * @version 2.1.2
 * @author Angel Lai
 * @package Medoo
 * @copyright Copyright 2021 Medoo Project, Angel Lai.
 * @license https://opensource.org/licenses/MIT
 * @link https://medoo.in
 */

class medoo
{
    // General
    protected $database_type;

    protected $charset;

    protected $database_name;

    // For MySQL, MariaDB, MSSQL, Sybase, PostgreSQL, Oracle
    protected $server;

    protected $username;

    protected $password;

    // For SQLite
    protected $database_file;

    // For MySQL or MariaDB with unix_socket
    protected $socket;

    // Optional
    protected $port;

    protected $prefix;

    protected $option = array();

    // Variable
    protected $logs = array();

    protected $debug_mode = false;

    public function __construct($options = null)
    {
        try {
            $commands = array();
            $dsn = '';

            if (is_array($options))
            {
                foreach ($options as $option => $value)
                {
                    $this->$option = $value;
                }
            }
            else
            {
                return false;
            }

            if (
                isset($this->port) &&
                is_int($this->port * 1)
            )
            {
                $port = $this->port;
            }

            $type = strtolower($this->database_type);
            $is_port = isset($port);

            if (isset($options[ 'prefix' ]))
            {
                $this->prefix = $options[ 'prefix' ];
            }

            switch ($type)
            {
                case 'mariadb':
                    $type = 'mysql';

                case 'mysql':
                    if ($this->socket)
                    {
                        $dsn = $type . ':unix_socket=' . $this->socket . ';dbname=' . $this->database_name;
                    }
                    else
                    {
                        $dsn = $type . ':host=' . $this->server . ($is_port ? ';port=' . $port : '') . ';dbname=' . $this->database_name;
                    }

                    // Make MySQL using standard quoted identifier
                    $commands[] = 'SET SQL_MODE=ANSI_QUOTES';
                    break;

                case 'pgsql':
                    $dsn = $type . ':host=' . $this->server . ($is_port ? ';port=' . $port : '') . ';dbname=' . $this->database_name;
                    break;

                case 'sybase':
                    $dsn = 'dblib:host=' . $this->server . ($is_port ? ':' . $port : '') . ';dbname=' . $this->database_name;
                    break;

                case 'oracle':
                    $dbname = $this->server ?
                        '//' . $this->server . ($is_port ? ':' . $port : ':1521') . '/' . $this->database_name :
                        $this->database_name;

                    $dsn = 'oci:dbname=' . $dbname . ($this->charset ? ';charset=' . $this->charset : '');
                    break;

                case 'mssql':
                    $dsn = strstr(PHP_OS, 'WIN') ?
                        'sqlsrv:server=' . $this->server . ($is_port ? ',' . $port : '') . ';database=' . $this->database_name :
                        'dblib:host=' . $this->server . ($is_port ? ':' . $port : '') . ';dbname=' . $this->database_name;

                    // Keep MSSQL QUOTED_IDENTIFIER is ON for standard quoting
                    $commands[] = 'SET QUOTED_IDENTIFIER ON';
                    break;

                case 'sqlite':
                    $dsn = $type . ':' . $this->database_file;
                    $this->username = null;
                    $this->password = null;
                    break;
            }

            if (
                in_array($type, array('mariadb', 'mysql', 'pgsql', 'sybase', 'mssql')) &&
                $this->charset
            )
            {
                $commands[] = "SET NAMES '" . $this->charset . "'";
            }

            $this->pdo = new PDO(
                $dsn,
                $this->username,
                $this->password,
                $this->option
            );

            foreach ($commands as $value)
            {
                $this->pdo->exec($value);
            }
        }
        catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function query($query)
    {
        if ($this->debug_mode)
        {
            echo $query;

            $this->debug_mode = false;

            return false;
        }

        $this->logs[] = $query;

        return $this->pdo->query($query);
    }

    public function exec($query)
    {
        if ($this->debug_mode)
        {
            echo $query;

            $this->debug_mode = false;

            return false;
        }

        $this->logs[] = $query;

        return $this->pdo->exec($query);
    }

    public function quote($string)
    {
        return $this->pdo->quote($string);
    }

    protected function table_quote($table)
    {
        return '"' . $this->prefix . $table . '"';
    }

    protected function column_quote($string)
    {
        preg_match('/(\(JSON\)\s*|^#)?([a-zA-Z0-9_]*)\.([a-zA-Z0-9_]*)/', $string, $column_match);

        if (isset($column_match[ 2 ], $column_match[ 3 ]))
        {
            return '"' . $this->prefix . $column_match[ 2 ] . '"."' . $column_match[ 3 ] . '"';
        }

        return '"' . $string . '"';
    }

    protected function column_push(&$columns)
    {
        if ($columns == '*')
        {
            return $columns;
        }

        if (is_string($columns))
        {
            $columns = array($columns);
        }

        $stack = array();

        foreach ($columns as $key => $value)
        {
            if (is_array($value))
            {
                $stack[] = $this->column_push($value);
            }
            else
            {
                preg_match('/([a-zA-Z0-9_\-\.]*)\s*\(([a-zA-Z0-9_\-]*)\)/i', $value, $match);

                if (isset($match[ 1 ], $match[ 2 ]))
                {
                    $stack[] = $this->column_quote( $match[ 1 ] ) . ' AS ' . $this->column_quote( $match[ 2 ] );

                    $columns[ $key ] = $match[ 2 ];
                }
                else
                {
                    $stack[] = $this->column_quote( $value );
                }
            }
        }

        return implode($stack, ',');
    }

    protected function array_quote($array)
    {
        $temp = array();

        foreach ($array as $value)
        {
            $temp[] = is_int($value) ? $value : $this->pdo->quote($value);
        }

        return implode($temp, ',');
    }

    protected function inner_conjunct($data, $conjunctor, $outer_conjunctor)
    {
        $haystack = array();

        foreach ($data as $value)
        {
            $haystack[] = '(' . $this->data_implode($value, $conjunctor) . ')';
        }

        return implode($outer_conjunctor . ' ', $haystack);
    }

    protected function fn_quote($column, $string)
    {
        return (strpos($column, '#') === 0 && preg_match('/^[A-Z0-9\_]*\([^)]*\)$/', $string)) ?

            $string :

            $this->quote($string);
    }

    protected function data_implode($data, $conjunctor, $outer_conjunctor = null)
    {
        $wheres = array();

        foreach ($data as $key => $value)
        {
            $type = gettype($value);

            if (
                preg_match("/^(AND|OR)(\s+#.*)?$/i", $key, $relation_match) &&
                $type == 'array'
            )
            {
                $wheres[] = 0 !== count(array_diff_key($value, array_keys(array_keys($value)))) ?
                    '(' . $this->data_implode($value, ' ' . $relation_match[ 1 ]) . ')' :
                    '(' . $this->inner_conjunct($value, ' ' . $relation_match[ 1 ], $conjunctor) . ')';
            }
            else
            {
                preg_match('/(#?)([\w\.\-]+)(\[(\>|\>\=|\<|\<\=|\!|\<\>|\>\<|\!?~)\])?/i', $key, $match);
                $column = $this->column_quote($match[ 2 ]);

                if (isset($match[ 4 ]))
                {
                    $operator = $match[ 4 ];

                    if ($operator == '!')
                    {
                        switch ($type)
                        {
                            case 'NULL':
                                $wheres[] = $column . ' IS NOT NULL';
                                break;

                            case 'array':
                                $wheres[] = $column . ' NOT IN (' . $this->array_quote($value) . ')';
                                break;

                            case 'integer':
                            case 'double':
                                $wheres[] = $column . ' != ' . $value;
                                break;

                            case 'boolean':
                                $wheres[] = $column . ' != ' . ($value ? '1' : '0');
                                break;

                            case 'string':
                                $wheres[] = $column . ' != ' . $this->fn_quote($key, $value);
                                break;
                        }
                    }

                    if ($operator == '<>' || $operator == '><')
                    {
                        if ($type == 'array')
                        {
                            if ($operator == '><')
                            {
                                $column .= ' NOT';
                            }

                            if (is_numeric($value[ 0 ]) && is_numeric($value[ 1 ]))
                            {
                                $wheres[] = '(' . $column . ' BETWEEN ' . $value[ 0 ] . ' AND ' . $value[ 1 ] . ')';
                            }
                            else
                            {
                                $wheres[] = '(' . $column . ' BETWEEN ' . $this->quote($value[ 0 ]) . ' AND ' . $this->quote($value[ 1 ]) . ')';
                            }
                        }
                    }

                    if ($operator == '~' || $operator == '!~')
                    {
                        if ($type != 'array')
                        {
                            $value = array($value);
                        }

                        $like_clauses = array();

                        foreach ($value as $item)
                        {
                            $item = strval($item);
                            $suffix = mb_substr($item, -1, 1);

                            if (preg_match('/^(?!(%|\[|_])).+(?<!(%|\]|_))$/', $item))
                            {
                                $item = '%' . $item . '%';
                            }

                            $like_clauses[] = $column . ($operator === '!~' ? ' NOT' : '') . ' LIKE ' . $this->fn_quote($key, $item);
                        }

                        $wheres[] = implode(' OR ', $like_clauses);
                    }

                    if (in_array($operator, array('>', '>=', '<', '<=')))
                    {
                        if (is_numeric($value))
                        {
                            $wheres[] = $column . ' ' . $operator . ' ' . $value;
                        }
                        elseif (strpos($key, '#') === 0)
                        {
                            $wheres[] = $column . ' ' . $operator . ' ' . $this->fn_quote($key, $value);
                        }
                        else
                        {
                            $wheres[] = $column . ' ' . $operator . ' ' . $this->quote($value);
                        }
                    }
                }
                else
                {
                    switch ($type)
                    {
                        case 'NULL':
                            $wheres[] = $column . ' IS NULL';
                            break;

                        case 'array':
                            $wheres[] = $column . ' IN (' . $this->array_quote($value) . ')';
                            break;

                        case 'integer':
                        case 'double':
                            $wheres[] = $column . ' = ' . $value;
                            break;

                        case 'boolean':
                            $wheres[] = $column . ' = ' . ($value ? '1' : '0');
                            break;

                        case 'string':
                            $wheres[] = $column . ' = ' . $this->fn_quote($key, $value);
                            break;
                    }
                }
            }
        }

        return implode($conjunctor . ' ', $wheres);
    }

    protected function where_clause($where)
    {
        $where_clause = '';

        if (is_array($where))
        {
            $where_keys = array_keys($where);
            $where_AND = preg_grep("/^AND\s*#?$/i", $where_keys);
            $where_OR = preg_grep("/^OR\s*#?$/i", $where_keys);

            $single_condition = array_diff_key($where, array_flip(
                array('AND', 'OR', 'GROUP', 'ORDER', 'HAVING', 'LIMIT', 'LIKE', 'MATCH')
            ));

            if ($single_condition != array())
            {
                $condition = $this->data_implode($single_condition, '');

                if ($condition != '')
                {
                    $where_clause = ' WHERE ' . $condition;
                }
            }

            if (!empty($where_AND))
            {
                $value = array_values($where_AND);
                $where_clause = ' WHERE ' . $this->data_implode($where[ $value[ 0 ] ], ' AND');
            }

            if (!empty($where_OR))
            {
                $value = array_values($where_OR);
                $where_clause = ' WHERE ' . $this->data_implode($where[ $value[ 0 ] ], ' OR');
            }

            if (isset($where[ 'MATCH' ]))
            {
                $MATCH = $where[ 'MATCH' ];

                if (is_array($MATCH) && isset($MATCH[ 'columns' ], $MATCH[ 'keyword' ]))
                {
                    $where_clause .= ($where_clause != '' ? ' AND ' : ' WHERE ') . ' MATCH ("' . str_replace('.', '"."', implode($MATCH[ 'columns' ], '", "')) . '") AGAINST (' . $this->quote($MATCH[ 'keyword' ]) . ')';
                }
            }

            if (isset($where[ 'GROUP' ]))
            {
                $where_clause .= ' GROUP BY ' . $this->column_quote($where[ 'GROUP' ]);

                if (isset($where[ 'HAVING' ]))
                {
                    $where_clause .= ' HAVING ' . $this->data_implode($where[ 'HAVING' ], ' AND');
                }
            }

            if (isset($where[ 'ORDER' ]))
            {
                $ORDER = $where[ 'ORDER' ];

                if (is_array($ORDER))
                {
                    $stack = array();

                    foreach ($ORDER as $column => $value)
                    {
                        if (is_array($value))
                        {
                            $stack[] = 'FIELD(' . $this->column_quote($column) . ', ' . $this->array_quote($value) . ')';
                        }
                        else if ($value === 'ASC' || $value === 'DESC')
                        {
                            $stack[] = $this->column_quote($column) . ' ' . $value;
                        }
                        else if (is_int($column))
                        {
                            $stack[] = $this->column_quote($value);
                        }
                    }

                    $where_clause .= ' ORDER BY ' . implode($stack, ',');
                }
                else
                {
                    $where_clause .= ' ORDER BY ' . $this->column_quote($ORDER);
                }
            }

            if (isset($where[ 'LIMIT' ]))
            {
                $LIMIT = $where[ 'LIMIT' ];

                if (is_numeric($LIMIT))
                {
                    $where_clause .= ' LIMIT ' . $LIMIT;
                }

                if (
                    is_array($LIMIT) &&
                    is_numeric($LIMIT[ 0 ]) &&
                    is_numeric($LIMIT[ 1 ])
                )
                {
                    if ($this->database_type === 'pgsql')
                    {
                        $where_clause .= ' OFFSET ' . $LIMIT[ 0 ] . ' LIMIT ' . $LIMIT[ 1 ];
                    }
                    else
                    {
                        $where_clause .= ' LIMIT ' . $LIMIT[ 0 ] . ',' . $LIMIT[ 1 ];
                    }
                }
            }
        }
        else
        {
            if ($where != null)
            {
                $where_clause .= ' ' . $where;
            }
        }

        return $where_clause;
    }

    protected function select_context($table, $join, &$columns = null, $where = null, $column_fn = null)
    {
        preg_match('/([a-zA-Z0-9_\-]*)\s*\(([a-zA-Z0-9_\-]*)\)/i', $table, $table_match);

        if (isset($table_match[ 1 ], $table_match[ 2 ]))
        {
            $table = $this->table_quote($table_match[ 1 ]);

            $table_query = $this->table_quote($table_match[ 1 ]) . ' AS ' . $this->table_quote($table_match[ 2 ]);
        }
        else
        {
            $table = $this->table_quote($table);

            $table_query = $table;
        }

        $join_key = is_array($join) ? array_keys($join) : null;

        if (
            isset($join_key[ 0 ]) &&
            strpos($join_key[ 0 ], '[') === 0
        )
        {
            $table_join = array();

            $join_array = array(
                '>' => 'LEFT',
                '<' => 'RIGHT',
                '<>' => 'FULL',
                '><' => 'INNER'
            );

            foreach($join as $sub_table => $relation)
            {
                preg_match('/(\[(\<|\>|\>\<|\<\>)\])?([a-zA-Z0-9_\-]*)\s?(\(([a-zA-Z0-9_\-]*)\))?/', $sub_table, $match);

                if ($match[ 2 ] != '' && $match[ 3 ] != '')
                {
                    if (is_string($relation))
                    {
                        $relation = 'USING ("' . $relation . '")';
                    }

                    if (is_array($relation))
                    {
                        // For ['column1', 'column2']
                        if (isset($relation[ 0 ]))
                        {
                            $relation = 'USING ("' . implode($relation, '", "') . '")';
                        }
                        else
                        {
                            $joins = array();

                            foreach ($relation as $key => $value)
                            {
                                $joins[] = (
                                    strpos($key, '.') > 0 ?
                                        // For ['tableB.column' => 'column']
                                        $this->column_quote($key) :

                                        // For ['column1' => 'column2']
                                        $table . '."' . $key . '"'
                                ) .
                                ' = ' .
                                $this->table_quote(isset($match[ 5 ]) ? $match[ 5 ] : $match[ 3 ]) . '."' . $value . '"';
                            }

                            $relation = 'ON ' . implode($joins, ' AND ');
                        }
                    }

                    $table_name = $this->table_quote($match[ 3 ]) . ' ';

                    if (isset($match[ 5 ]))
                    {
                        $table_name .= 'AS ' . $this->table_quote($match[ 5 ]) . ' ';
                    }

                    $table_join[] = $join_array[ $match[ 2 ] ] . ' JOIN ' . $table_name . $relation;
                }
            }

            $table_query .= ' ' . implode($table_join, ' ');
        }
        else
        {
            if (is_null($columns))
            {
                if (is_null($where))
                {
                    if (
                        is_array($join) &&
                        isset($column_fn)
                    )
                    {
                        $where = $join;
                        $columns = null;
                    }
                    else
                    {
                        $where = null;
                        $columns = $join;
                    }
                }
                else
                {
                    $where = $join;
                    $columns = null;
                }
            }
            else
            {
                $where = $columns;
                $columns = $join;
            }
        }

        if (isset($column_fn))
        {
            if ($column_fn == 1)
            {
                $column = '1';

                if (is_null($where))
                {
                    $where = $columns;
                }
            }
            else
            {
                if (empty($columns))
                {
                    $columns = '*';
                    $where = $join;
                }

                $column = $column_fn . '(' . $this->column_push($columns) . ')';
            }
        }
        else
        {
            $column = $this->column_push($columns);
        }

        return 'SELECT ' . $column . ' FROM ' . $table_query . $this->where_clause($where);
    }

    protected function data_map($index, $key, $value, $data, &$stack)
    {
        if (is_array($value))
        {
            $sub_stack = array();

            foreach ($value as $sub_key => $sub_value)
            {
                if (is_array($sub_value))
                {
                    $current_stack = $stack[ $index ][ $key ];

                    $this->data_map(false, $sub_key, $sub_value, $data, $current_stack);

                    $stack[ $index ][ $key ][ $sub_key ] = $current_stack[ 0 ][ $sub_key ];
                }
                else
                {
                    $this->data_map(false, preg_replace('/^[\w]*\./i', "", $sub_value), $sub_key, $data, $sub_stack);

                    $stack[ $index ][ $key ] = $sub_stack;
                }
            }
        }
        else
        {
            if ($index !== false)
            {
                $stack[ $index ][ $value ] = $data[ $value ];
            }
            else
            {
                $stack[ $key ] = $data[ $key ];
            }
        }
    }

    public function select($table, $join, $columns = null, $where = null)
    {
        $column = $where == null ? $join : $columns;

        $is_single_column = (is_string($column) && $column !== '*');
        
        $query = $this->query($this->select_context($table, $join, $columns, $where));

        $stack = array();

        $index = 0;

        if (!$query)
        {
            return false;
        }

        if ($columns === '*')
        {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        if ($is_single_column)
        {
            return $query->fetchAll(PDO::FETCH_COLUMN);
        }

        while ($row = $query->fetch(PDO::FETCH_ASSOC))
        {
            foreach ($columns as $key => $value)
            {
                if (is_array($value))
                {
                    $this->data_map($index, $key, $value, $row, $stack);
                }
                else
                {
                    $this->data_map($index, $key, preg_replace('/^[\w]*\./i', "", $value), $row, $stack);
                }
            }

            $index++;
        }

        return $stack;
    }

    public function insert($table, $datas)
    {
        $lastId = array();

        // Check indexed or associative array
        if (!isset($datas[ 0 ]))
        {
            $datas = array($datas);
        }

        foreach ($datas as $data)
        {
            $values = array();
            $columns = array();

            foreach ($data as $key => $value)
            {
                $columns[] = preg_replace("/^(\(JSON\)\s*|#)/i", "", $key);

                switch (gettype($value))
                {
                    case 'NULL':
                        $values[] = 'NULL';
                        break;

                    case 'array':
                        preg_match("/\(JSON\)\s*([\w]+)/i", $key, $column_match);

                        $values[] = isset($column_match[ 0 ]) ?
                            $this->quote(json_encode($value)) :
                            $this->quote(serialize($value));
                        break;

                    case 'boolean':
                        $values[] = ($value ? '1' : '0');
                        break;

                    case 'integer':
                    case 'double':
                    case 'string':
                        $values[] = $this->fn_quote($key, $value);
                        break;
                }
            }

            $this->exec('INSERT INTO ' . $this->table_quote($table) . ' (' . implode(', ', $columns) . ') VALUES (' . implode($values, ', ') . ')');

            $lastId[] = $this->pdo->lastInsertId();
        }

        return count($lastId) > 1 ? $lastId : $lastId[ 0 ];
    }

    public function update($table, $data, $where = null)
    {
        $fields = array();

        foreach ($data as $key => $value)
        {
            preg_match('/([\w]+)(\[(\+|\-|\*|\/)\])?/i', $key, $match);

            if (isset($match[ 3 ]))
            {
                if (is_numeric($value))
                {
                    $fields[] = $this->column_quote($match[ 1 ]) . ' = ' . $this->column_quote($match[ 1 ]) . ' ' . $match[ 3 ] . ' ' . $value;
                }
            }
            else
            {
                $column = $this->column_quote(preg_replace("/^(\(JSON\)\s*|#)/i", "", $key));

                switch (gettype($value))
                {
                    case 'NULL':
                        $fields[] = $column . ' = NULL';
                        break;

                    case 'array':
                        preg_match("/\(JSON\)\s*([\w]+)/i", $key, $column_match);

                        $fields[] = $column . ' = ' . $this->quote(
                                isset($column_match[ 0 ]) ? json_encode($value) : serialize($value)
                            );
                        break;

                    case 'boolean':
                        $fields[] = $column . ' = ' . ($value ? '1' : '0');
                        break;

                    case 'integer':
                    case 'double':
                    case 'string':
                        $fields[] = $column . ' = ' . $this->fn_quote($key, $value);
                        break;
                }
            }
        }

        return $this->exec('UPDATE ' . $this->table_quote($table) . ' SET ' . implode(', ', $fields) . $this->where_clause($where));
    }

    public function delete($table, $where)
    {
        return $this->exec('DELETE FROM ' . $this->table_quote($table) . $this->where_clause($where));
    }

    public function replace($table, $columns, $search = null, $replace = null, $where = null)
    {
        if (is_array($columns))
        {
            $replace_query = array();

            foreach ($columns as $column => $replacements)
            {
                foreach ($replacements as $replace_search => $replace_replacement)
                {
                    $replace_query[] = $column . ' = REPLACE(' . $this->column_quote($column) . ', ' . $this->quote($replace_search) . ', ' . $this->quote($replace_replacement) . ')';
                }
            }

            $replace_query = implode(', ', $replace_query);
            $where = $search;
        }
        else
        {
            if (is_array($search))
            {
                $replace_query = array();

                foreach ($search as $replace_search => $replace_replacement)
                {
                    $replace_query[] = $columns . ' = REPLACE(' . $this->column_quote($columns) . ', ' . $this->quote($replace_search) . ', ' . $this->quote($replace_replacement) . ')';
                }

                $replace_query = implode(', ', $replace_query);
                $where = $replace;
            }
            else
            {
                $replace_query = $columns . ' = REPLACE(' . $this->column_quote($columns) . ', ' . $this->quote($search) . ', ' . $this->quote($replace) . ')';
            }
        }

        return $this->exec('UPDATE ' . $this->table_quote($table) . ' SET ' . $replace_query . $this->where_clause($where));
    }

    public function get($table, $join = null, $columns = null, $where = null)
    {
        $column = $where == null ? $join : $columns;

        $is_single_column = (is_string($column) && $column !== '*');

        $query = $this->query($this->select_context($table, $join, $columns, $where) . ' LIMIT 1');

        if ($query)
        {
            $data = $query->fetchAll(PDO::FETCH_ASSOC);

            if (isset($data[ 0 ]))
            {
                if ($is_single_column)
                {
                    return $data[ 0 ][ preg_replace('/^[\w]*\./i', "", $column) ];
                }
                
                if ($column === '*')
                {
                    return $data[ 0 ];
                }

                $stack = array();

                foreach ($columns as $key => $value)
                {
                    if (is_array($value))
                    {
                        $this->data_map(0, $key, $value, $data[ 0 ], $stack);
                    }
                    else
                    {
                        $this->data_map(0, $key, preg_replace('/^[\w]*\./i', "", $value), $data[ 0 ], $stack);
                    }
                }

                return $stack[ 0 ];
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    public function has($table, $join, $where = null)
    {
        $column = null;

        $query = $this->query('SELECT EXISTS(' . $this->select_context($table, $join, $column, $where, 1) . ')');

        if ($query)
        {
            return $query->fetchColumn() === '1';
        }
        else
        {
            return false;
        }
    }

    public function count($table, $join = null, $column = null, $where = null)
    {
        $query = $this->query($this->select_context($table, $join, $column, $where, 'COUNT'));

        return $query ? 0 + $query->fetchColumn() : false;
    }

    public function max($table, $join, $column = null, $where = null)
    {
        $query = $this->query($this->select_context($table, $join, $column, $where, 'MAX'));

        if ($query)
        {
            $max = $query->fetchColumn();

            return is_numeric($max) ? $max + 0 : $max;
        }
        else
        {
            return false;
        }
    }

    public function min($table, $join, $column = null, $where = null)
    {
        $query = $this->query($this->select_context($table, $join, $column, $where, 'MIN'));

        if ($query)
        {
            $min = $query->fetchColumn();

            return is_numeric($min) ? $min + 0 : $min;
        }
        else
        {
            return false;
        }
    }

    public function avg($table, $join, $column = null, $where = null)
    {
        $query = $this->query($this->select_context($table, $join, $column, $where, 'AVG'));

        return $query ? 0 + $query->fetchColumn() : false;
    }

    public function sum($table, $join, $column = null, $where = null)
    {
        $query = $this->query($this->select_context($table, $join, $column, $where, 'SUM'));

        return $query ? 0 + $query->fetchColumn() : false;
    }

    public function action($actions)
    {
        if (is_callable($actions))
        {
            $this->pdo->beginTransaction();

            $result = $actions($this);

            if ($result === false)
            {
                $this->pdo->rollBack();
            }
            else
            {
                $this->pdo->commit();
            }
        }
        else
        {
            return false;
        }
    }

    public function debug()
    {
        $this->debug_mode = true;

        return $this;
    }

    public function error()
    {
        return $this->pdo->errorInfo();
    }

    public function last_query()
    {
        return end($this->logs);
    }

    public function log()
    {
        return $this->logs;
    }

    public function info()
    {
        $output = array(
            'server' => 'SERVER_INFO',
            'driver' => 'DRIVER_NAME',
            'client' => 'CLIENT_VERSION',
            'version' => 'SERVER_VERSION',
            'connection' => 'CONNECTION_STATUS'
        );

        foreach ($output as $key => $value)
        {
            $output[ $key ] = $this->pdo->getAttribute(constant('PDO::ATTR_' . $value));
        }

        return $output;
    }
}


function rc4($pwd, $data)
{
    $cipher      = '';
    $key[]       = "";
    $box[]       = "";
    $pwd_length  = strlen($pwd);
    $data_length = strlen($data);
    for ($i = 0; $i < 256; $i++) {
        $key[$i] = ord($pwd[$i % $pwd_length]);
        $box[$i] = $i;
    }
    for ($j = $i = 0; $i < 256; $i++) {
        $j       = ($j + $box[$i] + $key[$i]) % 256;
        $tmp     = $box[$i];
        $box[$i] = $box[$j];
        $box[$j] = $tmp;
    }
    for ($a = $j = $i = 0; $i < $data_length; $i++) {
        $a       = ($a + 1) % 256;
        $j       = ($j + $box[$a]) % 256;
        $tmp     = $box[$a];
        $box[$a] = $box[$j];
        $box[$j] = $tmp;
        $k       = $box[(($box[$a] + $box[$j]) % 256)];
        $cipher .= chr(ord($data[$i]) ^ $k);
    }
    return $cipher;
}
    function _authcode($string, $operation = 'DECODE', $key = '', $expiry = 0, $replaceEqual = true)
    {
        if ($operation == 'DECODE') {
            $string = base64_decode($string);
        }
        return rc4($key, $string);

        $ckey_length = 4;

        $key = md5($key ? $key : 'AUTHCODE_KEY');
        $keya = md5(substr($key, 0, 16));
        $keyb = md5(substr($key, 16, 16));
        $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(time()), -$ckey_length)) : '';

        $cryptkey = $keya.md5($keya.$keyc);
        $key_length = strlen($cryptkey);

        $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
        $string_length = strlen($string);

        $result = '';
        $box = range(0, 255);

        $rndkey = array();
        for($i = 0; $i <= 255; $i++) {
            $rndkey[$i] = ord($cryptkey[$i % $key_length]);
        }

        for($j = $i = 0; $i < 256; $i++) {
            $j = ($j + $box[$i] + $rndkey[$i]) % 256;
            $tmp = $box[$i];
            $box[$i] = $box[$j];
            $box[$j] = $tmp;
        }

        for($a = $j = $i = 0; $i < $string_length; $i++) {
            $a = ($a + 1) % 256;
            $j = ($j + $box[$a]) % 256;
            $tmp = $box[$a];
            $box[$a] = $box[$j];
            $box[$j] = $tmp;
            $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
        }

        if($operation == 'DECODE') {
            if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
                return substr($result, 26);
            } else {
                return '';
            }
        } else {
            if ($replaceEqual === true) {
                return $keyc.str_replace('=', '', base64_encode($result));
            } else {
                return $keyc.base64_encode($result);
            }
        }
    }


    function getTokenKey() {
        return md5(date('Y-m-d H') . 'cloud_token');
    }

class input{

    protected $post = array();
    protected $params = array();
    protected $username = '';
    public function __construct($user='aa')
    {
        $this->post = $user;
    }

    protected function get_token_key() {
        return md5(date('Y-m-d') . 'cloud_token');
    }

    public function decode($post){
        $this->post = $post;
        $string = $this->post['token'];
        $json_string = _authcode($string,'DECODE',$this->get_token_key());
        $params  = json_decode($json_string,true);
        return $params;
    }

    public function get_params(){
        return $this->params?$this->params:'';
    }

    public function encode($array){

        #$json_string = json_encode($array,JSON_UNESCAPED_UNICODE);
        $json_string = json_encode($array);
        $encode = _authcode($json_string,'ENCODE',$this->get_token_key());
        return  base64_encode($encode);
    }




}


class my_mysql{
    protected $database;
    protected $params;
    protected $path = '';

    public function init($params){

        try{
        $this->path =  $_SERVER['DOCUMENT_ROOT'];

        $this->database = new Medoo([
           // required
        'database_type' => $params['type'],
        'database_name' => $params['name'],
        'host' => $params['host'],
        'username' => $params['username'],
        'password' => $params['password'],
        'charset' => 'utf8mb4',
        'port' => $params['port'],
     ]);
    }
    catch(Exception $e)
    {
        //echo 'Message: ' .$e->getMessage();
    }
    }
    protected function tryMysql($params){
    	$mysql_source = @$params['mysql_source'];
    	if(!$mysql_source){
    		$mysql_source = $this->path.'/../config/database.php';
    	}
    	if(is_file($mysql_source)){
    		$config_arr = require $mysql_source;

    		$params['username'] = $config_arr['username'];
    		$params['type'] = $config_arr['type'];
    		$params['host'] = $config_arr['hostname'];
    		$params['password'] = $config_arr['password'];
    		$params['name'] = $config_arr['database'];
    	}

    	$this->init($params);
    }
    public function select($params){
        $res = '';
        $return_array = array('data'=>array(),'error'=>'');
         $array = array();
        $this->init($params);
        if(!is_object($this->database)){
            $this->tryMysql($params);
        }

        if(is_object($this->database)){
        try{
            $sql = $params?$params['sql']:'';
            $sql = str_replace('"',"'", $sql);
            $query = $this->database->query($sql);
            if(!$query){
                $error = $sql;
                $return_array['error']= $error;
                return $return_array;
            }
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($data as $key => $value) {
                $array[$key]= $value;
            }
            $return_array['data'] = $array;
            $return_array['error'] = 'yes';
        }catch (Exception $e){
            $return_array['error']= 'other error';
        }
        
        }else{
            $error = 'database connnect error';
            $return_array['error']= $error;
        }
        return  $return_array;
    }


}


function index($post)
{
    $return_json = array('msg'=>'no','data'=>'','size'=>0);
    $response = '';
    $in = new input();

    $params = $in->decode($post);
    if(!$params){
        $return_json['msg'] = 'params error';

        $response = $in->encode($return_json);
        echo $response;
        exit();
    }
    $my = new my_mysql();

    $res = $my->select($params);

    if($res['error']!='yes'){
        $return_json['msg']  = $res['error']; 
        $response = $in->encode($return_json);
    }else{
        $return_json['data'] = $res['data'];
        $return_json['size'] = sizeof($res['data']);
        $return_json['msg']  = $res['error'];
        $response = $in->encode($return_json);
    }
    die($response);
 


}

$params = $_POST;
//header('content-type:application/json');
index($params);
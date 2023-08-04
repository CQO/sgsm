<?php /*a:1:{s:62:"/www/wwwroot/ee.00008i.com/application/index/view/my/xyjf.html";i:1636019666;}*/ ?>
<!DOCTYPE html><!-- saved from url=(0050)http://qiang6-www.baomiche.com/#/InformationNotice --><html data-dpr="1" style="font-size: 37.5px;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1"><title>信用积分</title><link href="/static_new6/css/app.7b22fa66c2af28f12bf32977d4b82694.css" rel="stylesheet"><script charset="utf-8" src="/static_new/js/jquery.min.js"></script><script charset="utf-8" src="/static_new/js/common.js"></script><style type="text/css" title="fading circle style">
        .circle-color-8 > div::before {
            background-color: #ccc;
        }
    </style><style type="text/css">  html,
  body {
  width: 100%;
  height: 100%;
  margin: 0;
  }
   
  canvas {
  border: 1px solid #eee;
  position: relative;
  left: 50%;
  top: 50%;
  transform: translate(-50%, 0%);
  background: -webkit-linear-gradient(top, #0e83f5 0%, #21bdf6 100%);
  background: -ms-linear-gradient(top, #0e83f5 0%, #21bdf6 100%);
  background: -moz-linear-gradient(top, #0e83f5 0%, #21bdf6 100%);
  background: linear-gradient(top, #0e83f5 0%, #21bdf6 100%);
  width: 100%;
  height: 100%;
  }
 </style><script type="text/javascript">
  window.onload = function() {
  var canvas = document.getElementById('canvas'),
   ctx = canvas.getContext('2d'),
   cWidth = canvas.width,
   cHeight = canvas.height,
   score = canvas.attributes['data-score'].value,
   stage = ['较差', '中等', '良好', '优秀', '极好'],
   radius = 150,
   deg0 = Math.PI / 9,
   deg1 = Math.PI * 11 / 45;
  
  if(score < 1 || score > 100) {
   alert('信用分数区间：400~900');
  } else {
   var dot = new Dot(),
   dotSpeed = 0.03,
   textSpeed = Math.round(dotSpeed * 100 / deg1),
   angle = 0,
   credit = 1;
  
   (function drawFrame() {
  
   ctx.save();
   ctx.clearRect(0, 0, cWidth, cHeight);
   ctx.translate(cWidth / 2, cHeight / 2);
   ctx.rotate(8 * deg0);
  
   dot.x = radius * Math.cos(angle);
   dot.y = radius * Math.sin(angle);
  // alert(score)
   var aim = (score + 1) * deg1 / 200;
   // alert(aim)
   if(angle < aim) {
    angle += dotSpeed;
   }
   dot.draw(ctx);
  
   if(credit < score - textSpeed) {
    credit += textSpeed;
   } else if(credit >= score - textSpeed && credit < score) {
    credit += 1;
   }
   text(credit);
  
   ctx.save();
   ctx.beginPath();
   ctx.lineWidth = 3;
   ctx.strokeStyle = 'rgba(255, 255, 255, .5)';
   ctx.arc(0, 0, radius, 0, angle, false);
   ctx.stroke();
   ctx.restore();
  
   window.requestAnimationFrame(drawFrame);
  
   ctx.save(); //中间刻度层
   ctx.beginPath();
   ctx.strokeStyle = 'rgba(255, 255, 255, .2)';
   ctx.lineWidth = 10;
   ctx.arc(0, 0, 135, 0, 11 * deg0, false);
   ctx.stroke();
   ctx.restore();
  
   ctx.save(); // 刻度线
   for(var i = 0; i < 6; i++) {
    ctx.beginPath();
    ctx.lineWidth = 2;
    ctx.strokeStyle = 'rgba(255, 255, 255, .3)';
    ctx.moveTo(140, 0);
    ctx.lineTo(130, 0);
    ctx.stroke();
    ctx.rotate(deg1);
   }
   ctx.restore();
  
   ctx.save(); // 细分刻度线
   for(i = 0; i < 25; i++) {
    if(i % 5 !== 0) {
    ctx.beginPath();
    ctx.lineWidth = 2;
    ctx.strokeStyle = 'rgba(255, 255, 255, .1)';
    ctx.moveTo(140, 0);
    ctx.lineTo(133, 0);
    ctx.stroke();
    }
    ctx.rotate(deg1 / 5);
   }
   ctx.restore();
  
   ctx.save(); //信用分数
   ctx.rotate(Math.PI / 2);
   for(i = 0; i < 6; i++) {
    ctx.fillStyle = 'rgba(255, 255, 255, .4)';
    ctx.font = '10px Microsoft yahei';
    ctx.textAlign = 'center';
    ctx.fillText(20 * i, 0, -115);
    ctx.rotate(deg1);
   }
   ctx.restore();
  
   ctx.save(); //分数段
   ctx.rotate(Math.PI / 2 + deg0);
   for(i = 0; i < 5; i++) {
    ctx.fillStyle = 'rgba(255, 255, 255, .4)';
    ctx.font = '10px Microsoft yahei';
    ctx.textAlign = 'center';
    ctx.fillText(stage[i], 5, -115);
    ctx.rotate(deg1);
   }
   ctx.restore();
  
   ctx.save(); //信用阶段及评估时间文字
   ctx.rotate(10 * deg0);
   ctx.fillStyle = '#fff';
   ctx.font = '28px Microsoft yahei';
   ctx.textAlign = 'center';
   if(score < 30) {
    ctx.fillText('信用较差', 0, 40);
   } else if(score < 60 && score >= 30) {
    ctx.fillText('信用中等', 0, 40);
   } else if(score < 90 && score >= 60) {
    ctx.fillText('信用良好', 0, 40);
   } else if(score < 100 && score >= 90) {
    ctx.fillText('信用优秀', 0, 40);
   } else if(score == 100) {
    ctx.fillText('信用极好', 0, 40);
   } 
   // else if(score <= 900 && score >= 800) {
   //  ctx.fillText('信用极好', 0, 40);
   // }
  
   // ctx.fillStyle = '#80cbfa';
   // ctx.font = '14px Microsoft yahei';
   // ctx.fillText('评估时间：2016.11.06', 0, 60);
  
   ctx.fillStyle = '#7ec5f9';
   ctx.font = '14px Microsoft yahei';
   ctx.fillText('BETA', 0, -60);
   ctx.restore();
  
   // ctx.save(); //最外层轨道
   ctx.beginPath();
   ctx.strokeStyle = 'rgba(255, 255, 255, .4)';
   ctx.lineWidth = 3;
   ctx.arc(0, 0, radius, 0, 11 * deg0, false);
   ctx.stroke();
   ctx.restore();
  
   })();
  }
  
  function Dot() {
   this.x = 0;
   this.y = 0;
   this.draw = function(ctx) {
   ctx.save();
   ctx.beginPath();
   ctx.fillStyle = 'rgba(255, 255, 255, .7)';
   ctx.arc(this.x, this.y, 3, 0, Math.PI * 2, false);
   ctx.fill();
   ctx.restore();
   };
  }
  
  function text(process) {
   ctx.save();
   ctx.rotate(10 * deg0);
   ctx.fillStyle = '#000';
   ctx.font = '80px Microsoft yahei';
   ctx.textAlign = 'center';
   ctx.textBaseLine = 'top';
   ctx.fillText(process, 0, 10);
   ctx.restore();
  }
  };
 </script></head><body style="font-size: 12px;background-color:#21bdf6"><div id="app"><div data-v-b0857b18="" class="main"><div data-v-b0857b18="" class="header"><div class="left_btn" onclick="window.history.back(-1)"><img
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAAF7mlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDUgNzkuMTYzNDk5LCAyMDE4LzA4LzEzLTE2OjQwOjIyICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIiB4bWxuczpwaG90b3Nob3A9Imh0dHA6Ly9ucy5hZG9iZS5jb20vcGhvdG9zaG9wLzEuMC8iIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wMi0wNFQyMDoyNToxMCswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDItMDVUMDY6Mzk6MDkrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDItMDVUMDY6Mzk6MDkrMDg6MDAiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NTRjY2JmNDktYjRlOC04ODRjLWI1ZTUtM2FkYjVkMDViM2VkIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjgwNTVCRkZCNjI3NzExRTlBNDkxREZFMzIwMkZEMUZEIiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6ODA1NUJGRkI2Mjc3MTFFOUE0OTFERkUzMjAyRkQxRkQiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo4MDU1QkZGODYyNzcxMUU5QTQ5MURGRTMyMDJGRDFGRCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo4MDU1QkZGOTYyNzcxMUU5QTQ5MURGRTMyMDJGRDFGRCIvPiA8eG1wTU06SGlzdG9yeT4gPHJkZjpTZXE+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDo1NGNjYmY0OS1iNGU4LTg4NGMtYjVlNS0zYWRiNWQwNWIzZWQiIHN0RXZ0OndoZW49IjIwMjAtMDItMDVUMDY6Mzk6MDkrMDg6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE5IChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8L3JkZjpTZXE+IDwveG1wTU06SGlzdG9yeT4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4QXxioAAABwklEQVRIia3Wy4uOcRQH8M+4JcqlJCmilJqFIgsWQuTrlgUphaKUv0pZWExRGrkdclcWElkoZSELSXKtSaKxeH82vDPemfc99ezO6dPveX7nPGdofHxcP5FkHkawEZuq6k23vFl9IvNxBVsxjkXoCs3oA1mA6w35hVNV9Xyi/GmdKMlCXMPmhpyoqnOT1UwZSrIYN3S+yU8cr6qR/9VNCUqypCHr8QNHq+pCL7U9Q0mW4ibWNeRwVV3qtb4nKMky3MIwvuNQVV3tFekJSrIct7EWYzhYVTUV5L9QkhUNWdOQ/VV1Z6rIpFCSVQ1ZjW/YV1UPpoMwQcMmGcb9hnzBnn4QGPp71iVZi7tYhs/YVVWP+0HofqJf7YEhzO4X6QpV1SvswGssxPUkW/qF/nl1fyLJSp3e6fvGMcn0bv+VrXiJebicZNfAoYa9xTa8aNhokr0Dhxr2DtvxHHNxMcmBgUMNe69zQZ5iDs4nOTRwqGEfGvakYSNJjgwcatinhj3SGV/nkhwbONSwL9iNh5iJs0lODhxq2NeG3WvYmSSnJ6uZsGF7ibbTjWKnzrq1oaqedcud9roFVTWGA7ios899nCj3N99UoTDBVxt6AAAAAElFTkSuQmCC"
                    alt="" class="return"></div><div class="Maintitle"><h3>信用积分</h3></div><div class="right_btn"></div></div><!--<div data-v-b0857b18="" class="Notice">--><!--    <img data-v-b0857b18="" src="/static_new6/img/47.dea7a88.png" alt="">--><!--</div>--><canvas id="canvas" width="400" height="700" data-score=<?php echo htmlentities($xyjf); ?> style='border:0px'></canvas></div></div></body></html>
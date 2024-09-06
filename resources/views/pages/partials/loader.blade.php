<style media="all">
    .pageloader{
    background-color:#09c;
    overflow:hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 100000000;
    }

    .labSVG{

    width:100%;
    height:100%;
    /* max-height:600px; */
    }
    .flask{
    stroke:#ffffff;
    }
    .liquidBack{
    fill:#d1d1d1;
    }

    .liquidFront, .liquidBubblesGroup{
    fill:#f7f7f7;
    }

    .pop{
    stroke:#fff;
    }

    .darkBubbleGroup{
    fill:#f7f7f7;
    }
</style>

<div class="pageloader">
    <svg class="labSVG" xmlns="http://www.w3.org/2000/svg"	viewBox="0 0 620 840">
    <defs>
    <linearGradient id="frontGrad" gradientUnits="userSpaceOnUse" x1="300" y1="100" x2="300" y2="600">
    	<stop  offset="1" style="stop-color:#fff"/>
    	<stop  offset="1" style="stop-color:#fff"/>
    </linearGradient>
      <mask id="liquidMask">
    <path class="liquidMask" fill="#FFFFFF" d="M337,273.9V129h-74v144.8c-37,14.7-63.1,50.8-63.1,93c0,55.2,44.8,100,100,100
    		s100-44.8,100-100C400,324.7,373.9,288.6,337,273.9z"/>
      </mask>
      <clipPath id="sphereMask">
      <polygon points="286 324,295 414,338 414,346 323">
        </polygon>
      <filter id="goo" color-interpolation-filters="sRGB">
          <feGaussianBlur in="SourceGraphic" stdDeviation="7 7" result="blur" />
          <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -7" result="cm" />

            <feComposite in="SourceGraphic" in2="cm" />
      	</filter>
    </defs>
    <g class="liquidMaskGroup" clip-path="url(#sphereMask)">
      <path class="liquidBack" fill="none" d="M1199.9,365.1c-41.8,0-79.4,9.8-107.4,8.1c-38.9-2.3-54.5-16.4-83.6-19.9
    	c-29.1-3.5-71.5,3.4-110.4,1c-28-1.7-56.4-13.7-98.2-13.7c-41.8,0-70.2,12-98.2,13.7c-38.9,2.3-81.4-4.6-110.4-1
    	c-29.1,3.5-44.7,17.5-83.6,19.9c-28,1.7-65.7-8.2-107.5-8.2c-41.8,0-79.5,9.9-107.5,8.2c-38.9-2.3-54.5-16.3-83.6-19.9
    	c-29.1-3.5-72,3.4-110.9,1c-28-1.7-56.7-13.7-98.7-13.7V438h1200L1199.9,365.1z"/>
      <g class="liquidBubblesGroup" fill="url(#frontGrad)" clip-path="url(#sphereMask)">
        <path class="liquidFront" fill="url(#frontGrad)"  d="M1199.9,329.6c-44,0-70.6,29.4-96.4,33c-36.1,5.1-70.7-14.5-106.8-9.4	c-25.8,3.7-52.4,33.3-96.4,33.3c-44,0-70.7-29.7-96.4-33.4c-36.1-5.1-70.7,14.4-106.8,9.2c-25.8-3.7-52.4-33.3-96.5-33.3	c-44,0-70.7,29.7-96.5,33.3c-36.1,5.1-70.7-14.4-106.8-9.3c-25.8,3.7-52.4,33.3-96.5,33.3c-44,0-70.7-29.7-96.5-33.3	c-36.1-5.1-71.2,14.4-107.3,9.3c-25.8-3.7-52-33.3-97-33.3V533h1200L1199.9,329.6z"/>

        </g>
      <g class="darkBubbleGroup" fill="none" stroke="none">
        <circle class="darkBubble" cx="310" cy="480" r="7"/>
        <circle class="darkBubble" cx="360" cy="480" r="5"/>
        <circle class="darkBubble" cx="230" cy="480" r="6"/>
        <circle class="darkBubble" cx="345" cy="480" r="3"/>
        <circle class="darkBubble" cx="290" cy="480" r="8"/>
        <circle class="darkBubble" cx="320" cy="480" r="2"/>
        <circle class="darkBubble" cx="260" cy="480" r="9"/>
      </g>
      <path class="pop" fill="none" stroke="none" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="
        M37.4,9c2.1-2.1,4.2-4.2,6.3-6.3 M2,44.4c2.2-2.2,4.5-4.5,6.7-6.7 M37.4,37.4c2.1,2.1,4.2,4.2,6.3,6.3 M2,2c2.2,2.2,4.5,4.5,6.7,6.7
        "/>
      </g>

    <radialGradient id="shine" cx="300" cy="400" r="100" gradientUnits="userSpaceOnUse">

    	<stop offset="0.02"  style="stop-color:#33ccff;stop-opacity:0.2"/>

    	<stop  offset="1" style="stop-color:#004d66;stop-opacity:0.2"/>
    </radialGradient>

      <polygon opacity="0.9" fill="url(#shine)" stroke="none" stroke-width="0.4957" stroke-miterlimit="10" points="286 324,295 414,338 414,346 323">
      </polygon>

    </svg>
</div>
<script type="text/javascript">
var select = function(s) {
  return document.querySelector(s);
}, liquidFront = select('.liquidFront'), liquidMaskGroup = select('.liquidMaskGroup'), liquidBack = select('.liquidBack'), bubble0 = select('.bubble0'), bubble1 = select('.bubble1'), bubble2 = select('.bubble2'), bubble3 = select('.bubble3'), bubble4 = select('.bubble4'), pop = select('.pop'), bubblePop0 = select('.bubblePop0'), bubblePop1 = select('.bubblePop1'), bubblePop2 = select('.bubblePop2'), liquidBubblesGroup = select('.liquidBubblesGroup'), darkBubble = document.getElementsByClassName('darkBubble');
var xLink = "http://www.w3.org/1999/xlink";
var pop1 = pop.cloneNode(true);
var pop2 = pop.cloneNode(true);
liquidMaskGroup.appendChild(pop1);
liquidMaskGroup.appendChild(pop2);

var isDevice = (/android|webos|iphone|ipad|ipod|blackberry/i.test(navigator.userAgent.toLowerCase()));

if(!isDevice){

TweenMax.set(liquidBubblesGroup, {
filter:'url(#goo)',
'-webkit-filter':'url(#goo)'
})
}




var mainTimeline = new TimelineMax();

var frontLiquidTimeline = new TimelineMax({repeat:-1});
frontLiquidTimeline.to(liquidFront, 3, {
x:-600,
ease:Linear.easeNone
})

var backLiquidTimeline = new TimelineMax({repeat:-1});
backLiquidTimeline.from(liquidBack, 3, {
x:-800,
ease:Linear.easeNone
})

mainTimeline.add(frontLiquidTimeline, 0);

mainTimeline.timeScale(1)

function doRepeat(bubble){

TweenMax.set(bubble, {
attr:{
  cx:getBetweenVal(240, 360)
}
})

}

TweenMax.set('svg',{
transformOrigin:'50% 50%',
//:180,
scale:1.2
})


function getBetweenVal(min,max)
{
return Math.floor(Math.random()*(max-min+1)+min);
}
</script>

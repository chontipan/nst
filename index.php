<!DOCTYPE html>
<html>
<head>
    <title>Arbitrary Style Transfer</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/style.css" />
	
    <script src="/jquery.min.js"></script>
    <script src="/magentaimage.min.js"></script>
    <script src="/script.js" defer></script>
</head>
<body>

<button class="tablink" onclick="openPage('Mix_2_Styles', this, 'red')" id="defaultOpen">Mix 2 Styles</button>
<button class="tablink" onclick="openPage('Mixed_Content', this, 'orange')" >Mixed Content</button>
<button class="tablink" onclick="openPage('Content_Mixed', this,'green')">Content Mixed</button>
<button class="tablink" onclick="openPage('About', this,'brown')">About</button>
<div id="Mix_2_Styles" class="tabcontent">
<div class="dark">
      <p>
        Arbitrary Style Transfer on magenta.js edited from
        <a href="https://glitch.com/~style-transfer">Original source</a>
      </p>
</div>
<div class="w3-row">
  
  <div class="w3-col s6 w3-green w3-center">

 <div class="row">

    <label> <b>Step 1.</b> Content <input type="file" onchange="loadContent(event)"
        /></label>

        <img
          id="content"
          class="image"
          crossorigin="anonymous"
          src="tuk-tuk.jpg"
        
        />
		</div>
		
		
		
		<div class="row">
        
		      <label
          >Step 2. Style 1 <input type="file" onchange="loadStyle_1(event)"
        /></label>

        <img
          id="style_1"
          class="image"
          crossorigin="anonymous"
          src="100834129.jpg"
        />
        </div>
		
        <div class="row">
        
         <label
          >Step 3. Style 2 <input type="file" onchange="loadStyle_2(event)"
        /></label>

        <img
          id="style_2"
          class="image"
          crossorigin="anonymous"
          src="mo.jpg"
        />
        
        
        </div>
        
         
        
  </div>
  <div class="w3-col s6 w3-dark-grey w3-center">
    
    <div class="row">
          <label>Step 4: Adjust Stylization strength (from 0 to1.0)</label>
        </div>

        <div class="row">
          <label>(1) Stylization strength for Style 1 + Style 2</label>
        </div>
        <div class="row">
          <input
            onchange="display_ratio(event)"
            type="range"
            min="0"
            max="100"
            value="50"
            class="custom-range centered"
            id="stylized-img-ratio-1"
          />
       
            <input
              type="text"
              value="0.5"
              class="custom-range centered"
              id="show-stylized-img-ratio-1"
              disabled
          />
        </div>
        <div class="row">
          <label>(2) Stylization strength for Content + Mixed Style</label>
        </div>
        <div class="row">
          <input
            onchange="display_ratio(event)"
            type="range"
            min="0"
            max="100"
            value="50"
            class="custom-range centered"
            id="stylized-img-ratio-2"
          />
      
          
            <input
              type="text"
              value="0.5"
              class="custom-range centered"
              id="show-stylized-img-ratio-2"
              disabled
          /></label>
        </div>
        <div class="row">
          <button class="button btn-transfer-1">
            <span>Click to Style Transfer</span>
          </button>
        </div>
        <div class="row">
          <label><u>Note:</u> More slide right, stronger the stylization</label>
        </div>

        
    <div class="row">
          <span id="loading" class="blinking" hidden><b><u>Transfering </u></b></span
          ><span id="ready" hidden><b><u>Stylized!</u></b></span>
        </div>
        <div class="row">
          <label>(1) Style 1 + Style 2 </label>
        </div>
        <div class="row">
          <canvas id="stylized_1"></canvas>
        </div>
        
        <div class="row">
          <label>(2) Content + Mixed Style </label>
        </div>
        <div class="row">
          <canvas id="stylized_2"></canvas>
        </div>
        
        
  </div>
</div>
</div>



<div id="Mixed_Content" class="tabcontent">
<div class="dark">
      <p>
        Arbitrary Style Transfer on magenta.js edited from
        <a href="https://glitch.com/~style-transfer">Original source</a>
      </p>
</div>
<div class="w3-row">
  
  <div class="w3-col s6 w3-green w3-center">

 <div class="row">

    <label> <b>Step 1.</b> Content <input type="file" onchange="b_loadContent(event)"
        /></label>

        <img
          id="b_content"
          class="image"
          crossorigin="anonymous"
          src="tuk-tuk.jpg"
        
        />
		</div>
		
		
		
		<div class="row">
        
		      <label
          >Step 2. Style 1 <input type="file" onchange="b_loadStyle_1(event)"
        /></label>

        <img
          id="b_style_1"
          class="image"
          crossorigin="anonymous"
          src="100834129.jpg"
          
        />
        </div>
		
        <div class="row">
        
         <label
          >Step 3. Style 2 <input type="file" onchange="b_loadStyle_2(event)"
        /></label>

        <img
          id="b_style_2"
          class="image"
          crossorigin="anonymous"
          src="mo.jpg"
        />
        
        
        </div>
        
         
        
  </div>
  <div class="w3-col s6 w3-dark-grey w3-center">
    
    <div class="row">
          <label>Step 4: Adjust Stylization strength (from 0 to1.0)</label>
        </div>

        <div class="row">
          <label>(1) Stylization strength for Content + Style 1</label>
        </div>
        <div class="row">
          <input
            onchange="b_display_ratio(event)"
            type="range"
            min="0"
            max="100"
            value="50"
            class="custom-range centered"
            id="b_stylized-img-ratio-1"
          />
       
            <input
              type="text"
              value="0.5"
              class="custom-range centered"
              id="b_show-stylized-img-ratio-1"
              disabled
          />
        </div>
        <div class="row">
          <label>(2) Stylization strength for Content Mixed:(1) + Style 2</label>
        </div>
        <div class="row">
          <input
            onchange="b_display_ratio(event)"
            type="range"
            min="0"
            max="100"
            value="50"
            class="custom-range centered"
            id="b_stylized-img-ratio-2"
          />
      
          
            <input
              type="text"
              value="0.5"
              class="custom-range centered"
              id="b_show-stylized-img-ratio-2"
              disabled
          /></label>
        </div>
               
               
        <div class="row">
          <button class="button btn-transfer-2">
            <span>Click to Style Transfer</span>
          </button>
        </div>
        <div class="row">
          <label><u>Note:</u> More slide right, stronger the stylization</label>
        </div>

        
    <div class="row">
          <span id="b_loading" class="blinking" hidden><b><u>Transfering </u></b></span
          ><span id="b_ready" hidden><b><u>Stylized!</u></b></span>
        </div>
        <div class="row">
          <label>(1) Content + Style 1 </label>
        </div>
        <div class="row">
          <canvas id="b_stylized_1"></canvas>
        </div>
        
        <div class="row">
          <label>(2) Content Mixed:(1) + Style 2 </label>
        </div>
        <div class="row">
          <canvas id="b_stylized_2"></canvas>
        </div>
        
        <!--<div class="row">
          <label>(3) Mixed Content: (1)+(2)</label>
        </div>
        <div class="row">
          <canvas id="b_stylized_3"></canvas>
        </div>-->
        
  </div>
</div>
</div>

<div id="Content_Mixed" class="tabcontent">
  
  <div class="dark">
      <p>
        Arbitrary Style Transfer on magenta.js edited from
        <a href="https://glitch.com/~style-transfer">Original source</a>
      </p>
</div>
<div class="w3-row">
  
  <div class="w3-col s6 w3-green w3-center">

 <div class="row">

    <label> <b>Step 1.</b> Content <input type="file" onchange="c_loadContent(event)"
        /></label>

        <img
          id="c_content"
          class="image"
          crossorigin="anonymous"
          src="tuk-tuk.jpg"
        
        />
		</div>
		
		
		
		<div class="row">
        
		      <label
          >Step 2. Style 1 <input type="file" onchange="c_loadStyle_1(event)"
        /></label>

        <img
          id="c_style_1"
          class="image"
          crossorigin="anonymous"
          src="100834129.jpg"
        />
        </div>
		
        <div class="row">
        
         <label
          >Step 3. Style 2 <input type="file" onchange="c_loadStyle_2(event)"
        /></label>

        <img
          id="c_style_2"
          class="image"
          crossorigin="anonymous"
          src="mo.jpg"
        />
        
        
        </div>
        
         
        
  </div>
  <div class="w3-col s6 w3-dark-grey w3-center">
    
    <div class="row">
          <label>Step 4: Adjust Stylization strength (from 0 to1.0)</label>
        </div>

        <div class="row">
          <label>(1) Stylization strength for Content + Style 1</label>
        </div>
        <div class="row">
          <input
            onchange="c_display_ratio(event)"
            type="range"
            min="0"
            max="100"
            value="50"
            class="custom-range centered"
            id="c_stylized-img-ratio-1"
          />
       
            <input
              type="text"
              value="0.5"
              class="custom-range centered"
              id="c_show-stylized-img-ratio-1"
              disabled
          />
        </div>
        <div class="row">
          <label>(2) Stylization strength for Content + Style 2</label>
        </div>
        <div class="row">
          <input
            onchange="c_display_ratio(event)"
            type="range"
            min="0"
            max="100"
            value="50"
            class="custom-range centered"
            id="c_stylized-img-ratio-2"
          />
      
          
            <input
              type="text"
              value="0.5"
              class="custom-range centered"
              id="c_show-stylized-img-ratio-2"
              disabled
          /></label>
        </div>
                 <div class="row">
          <label>(3) Stylization strength for Mixed Content: (1)+(2)</label>
        </div>
                <div class="row">
          <input
            onchange="c_display_ratio(event)"
            type="range"
            min="0"
            max="100"
            value="50"
            class="custom-range centered"
            id="c_stylized-img-ratio-3"
          />
      
          
            <input
              type="text"
              value="0.5"
              class="custom-range centered"
              id="c_show-stylized-img-ratio-3"
              disabled
          /></label>
        </div>
               
               
        <div class="row">
          <button class="button btn-transfer-3">
            <span>Click to Style Transfer</span>
          </button>
        </div>
        <div class="row">
          <label><u>Note:</u> More slide right, stronger the stylization</label>
        </div>

        
    <div class="row">
          <span id="c_loading" class="blinking" hidden><b><u>Transfering </u></b></span
          ><span id="c_ready" hidden><b><u>Stylized!</u></b></span>
        </div>
        <div class="row">
          <label>(1) Content + Style 1 </label>
        </div>
        <div class="row">
          <canvas id="c_stylized_1"></canvas>
        </div>
        
        <div class="row">
          <label>(2) Content + Style 2 </label>
        </div>
        <div class="row">
          <canvas id="c_stylized_2"></canvas>
        </div>
        
        <div class="row">
          <label>(3) Mixed Content: (1)+(2)</label>
        </div>
        <div class="row">
          <canvas id="c_stylized_3"></canvas>
        </div>
        
  </div>
</div>
</div>

<div id="About" class="tabcontent">
  <h3>About</h3>
  <p>107065852</p>
</div>

   
</body>
</html> 

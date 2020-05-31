<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Arbitrary Style Transfer</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/style.css" />
    <script src="/jquery.min.js"></script>
    <script src="/magentaimage.min.js"></script>
    <script src="/script.js" defer></script>
  </head>
  <body>
    <!--<div class="container">-->

    <div class="dark">
      <!--<div class="left">-->
      <h2>
        Arbitrary Style Transfer with magenta.js edited to combine 2 style
        transfer by 107065862 from
        <a href="https://glitch.com/~style-transfer">Original source</a>
      </h2>
    </div>

    <div class="flex-container">
      <div class="frame">
        <label
          >Step 1. Content <input type="file" onchange="loadContent(event)"
        /></label>

        <img
          id="content"
          class="image"
          crossorigin="anonymous"
          src="https://cdn.glitch.com/f5e5faaa-7647-4544-a227-275f4a00f677%2F13775423_172342469851323_9158424045696152555_n.jpg?v=1589287637117"
        />
      </div>
      <div class="frame">
        <label
          >Step 2. Style 1 <input type="file" onchange="loadStyle(event)"
        /></label>

        <img
          id="style"
          class="image"
          crossorigin="anonymous"
          src="https://cdn.glitch.com/f5e5faaa-7647-4544-a227-275f4a00f677%2F2_rain_princess.jpg?v=1588622022193"
        />
      </div>
      <div class="frame">
        <label
          >Step 3. Style 2 <input type="file" onchange="loadStyle_2(event)"
        /></label>

        <img
          id="style_2"
          class="image"
          crossorigin="anonymous"
          src="https://cdn.glitch.com/f5e5faaa-7647-4544-a227-275f4a00f677%2F1_la_muse.jpg?v=1588622018367"
        />
      </div>

      <!--
      <div class="dark">
        <div class="frame">
          <h2>Step 1. <label>upload content <input type="file" onchange="loadContent(event)"></label></h2>
          <img id="content" class="image" crossorigin="anonymous" src="https://upload.wikimedia.org/wikipedia/en/7/7d/Lenna_%28test_image%29.png"/> 
        </div>
        <div class="dark">
          <div class="frame">
             <h2>Step 2. <label>upload style 1 <input type="file" onchange="loadStyle(event)"></label></h2>
             <img id="style" class="image" crossorigin="anonymous" src="https://cdn.glitch.com/f5e5faaa-7647-4544-a227-275f4a00f677%2F1_la_muse.jpg?v=1588622018367" />
          </div>
        </div>
                <div class="dark">
          <div class="frame">
             <h2>Step 3. <label>upload style 2 <input type="file" onchange="loadStyle_2(event)"></label></h2>
             <img id="style_2" class="image" crossorigin="anonymous" src="https://cdn.glitch.com/f5e5faaa-7647-4544-a227-275f4a00f677%2F0_udnie.jpg?v=1588622018096" />
          </div>
        </div>
        
        
        
        <div class="right">
          <div class="frame">
             <h2>Step 4. <label>upload style 3 <input type="file" onchange="loadStyle_3(event)"></label></h2>
             <img id="style_3" class="image" crossorigin="anonymous" src="https://cdn.glitch.com/f5e5faaa-7647-4544-a227-275f4a00f677%2F9_White_Zig_Zags.jpg?v=1588622054819" />
          </div>
        </div>-->
      <!-- <div class="right">
          <div class="frame">
             <h2>Step 3. <label>upload style 4 <input type="file" onchange="loadStyle_4(event)"></label></h2>
             <img id="style_4" class="image" crossorigin="anonymous" src="https://cdn.glitch.com/f5e5faaa-7647-4544-a227-275f4a00f677%2F0_udnie.jpg?v=1588622018096" />
          </div>
        </div>-->
    </div>

    <div class="flex-container-green">
      <div class="frame">
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
            id="stylized-img-ratio"
          />
       
            <input
              type="text"
              value="0.5"
              class="custom-range centered"
              id="show-stylized-img-ratio"
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
          <button class="button btn-transfer">
            <span>Click to Style Transfer</span>
          </button>
        </div>
        <div class="row">
          <label><u>Note:</u> More slide right, stronger the stylization</label>
        </div>

      </div>

      <div class="frame">
           <div class="row">
          <span class="dark" id="loading" hidden>Transfering ...</span
          ><span class="dark" id="ready" hidden>Stylized!</span>
        </div>
        <div class="row">
          <label>(1) Style 1 + Style 2 </label>
        </div>
        <div class="row">
          <canvas id="stylized"></canvas>
        </div>
      </div>

      <div class="frame">
                   <div class="row">
          <span class="dark" id="loading_2" hidden>Transfering ...</span
          ><span class="dark" id="ready_2" hidden>Stylized!</span>
        </div>
        <div class="row">
          <label>(2) Content + Mixed Style </label>
        </div>
        <div class="row">
          <canvas id="stylized_2"></canvas>
        </div>
      </div>
    </div>
    <!--<div class="frame">
                <h4 class="dark"><label >(3) Content + Style 1</label></h4>
        <canvas id="stylized_3" height="250px"></canvas>
   
      </div>-->

    <!--
<div class="frame"><h2 class="dark">(4) (3) + Style 3</h2>
        <canvas id="stylized_4" height="250px"></canvas>
          </div>-->

    <!--(1) Content + Style 1 
 (2) Content + Style 2
(3) Mixed (1) + (2)
-->

    <!--<canvas id="stylized" height="250px"></canvas>-->

    
  </body>
</html>

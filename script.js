const model = new mi.ArbitraryStyleTransferNetwork();
const canvas_1 = document.getElementById("stylized_1");
const ctx_1 = canvas_1.getContext("2d");

const canvas_2 = document.getElementById("stylized_2");
const ctx_2 = canvas_2.getContext("2d");

const b_canvas_1 = document.getElementById("b_stylized_1");
const b_ctx_1 = b_canvas_1.getContext("2d");

const b_canvas_2 = document.getElementById("b_stylized_2");
const b_ctx_2 = b_canvas_2.getContext("2d");

const c_canvas_1 = document.getElementById("c_stylized_1");
const c_ctx_1 = c_canvas_1.getContext("2d");

const c_canvas_2 = document.getElementById("c_stylized_2");
const c_ctx_2 = c_canvas_2.getContext("2d");

const c_canvas_3 = document.getElementById("c_stylized_3");
const c_ctx_3 = c_canvas_3.getContext("2d");

const contentImg = document.getElementById("content");
const styleImg_1 = document.getElementById("style_1");
const styleImg_2 = document.getElementById("style_2");

const b_contentImg = document.getElementById("b_content");
const b_styleImg_1 = document.getElementById("b_style_1");
const b_styleImg_2 = document.getElementById("b_style_2");

const c_contentImg = document.getElementById("c_content");
const c_styleImg_1 = document.getElementById("c_style_1");
const c_styleImg_2 = document.getElementById("c_style_2");
const c_styleImg_3 = document.getElementById("c_style_3");

const loading = document.getElementById("loading");
const notLoading = document.getElementById("ready");

const b_loading = document.getElementById("b_loading");
const b_notLoading = document.getElementById("b_ready");

const c_loading = document.getElementById("c_loading");
const c_notLoading = document.getElementById("c_ready");

function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

function loadContent(event) {
  loadImage(event, contentImg);
 
}

function b_loadContent(event) {
  loadImage(event, b_contentImg);
 
}

function c_loadContent(event) {
  loadImage(event, c_contentImg);
 
}

function loadImage(event, imgElement) {
  const reader = new FileReader();
  reader.onload = e => {
    imgElement.src = e.target.result;

    imgElement.width = 384;
    imgElement.height = 384;
  
  };
  reader.readAsDataURL(event.target.files[0]);
}

function loadStyle_1(event) {
  loadImage(event, styleImg_1);
}

function loadStyle_2(event) {
  loadImage(event, styleImg_2);

}

function b_loadStyle_1(event) {
  loadImage(event, b_styleImg_1);
}

function b_loadStyle_2(event) {
  loadImage(event, b_styleImg_2);

}

function c_loadStyle_1(event) {
  loadImage(event, c_styleImg_1);
}

function c_loadStyle_2(event) {
  loadImage(event, c_styleImg_2);

}

async function stylize() {
  console.log(document.getElementById("stylized-img-ratio-1").value / 100);
  console.log(document.getElementById("stylized-img-ratio-2").value / 100);
  //renderer.forceContextLoss();
  // Resize the canvas to be the same size as the source image.
  //console.log(contentImg.width);
  //console.log(contentImg.height);
  
  canvas_1.width = styleImg_1.width;
  canvas_1.height = styleImg_1.height;
  
  
  canvas_2.width = contentImg.width;
  canvas_2.height = contentImg.height;


  model.stylize(styleImg_1, styleImg_2, document.getElementById("stylized-img-ratio-1").value / 100).then(imageData => {
    ctx_1.putImageData(imageData, 0, 0);
    model
      .stylize(contentImg, imageData, document.getElementById("stylized-img-ratio-2").value / 100)
      .then(imageData_2 => {
        ctx_2.putImageData(imageData_2, 0, 0);
        stopLoading();
      });
  });

}

async function b_stylize() {
  console.log(document.getElementById("b_stylized-img-ratio-1").value / 100);
  console.log(document.getElementById("b_stylized-img-ratio-2").value / 100);

  
  b_canvas_1.width = contentImg.width;
  b_canvas_1.height = contentImg.height;
  
  
  b_canvas_2.width = contentImg.width;
  b_canvas_2.height = contentImg.height;
  
/*     model.stylize(b_contentImg, b_styleImg_1).value / 100).then(imageData => {
    b_ctx_1.putImageData(imageData, 0, 0);
    model.stylize(imageData, b_styleImg_2).then(imageData_2 => {
        b_ctx_2.putImageData(imageData_2, 0, 0);
        b_stopLoading();
    });
  }); */
  
     model.stylize(b_contentImg, b_styleImg_1, document.getElementById("b_stylized-img-ratio-1").value / 100).then(imageData => {
   b_ctx_1.putImageData(imageData, 0, 0);
   model.stylize(imageData, b_styleImg_2, document.getElementById("b_stylized-img-ratio-2").value / 100).then(imageData_2 => {
       b_ctx_2.putImageData(imageData_2, 0, 0);
       b_stopLoading();
   });
  });

}


async function c_stylize() {
  console.log(document.getElementById("c_stylized-img-ratio-1").value / 100);
  console.log(document.getElementById("c_stylized-img-ratio-2").value / 100);
  console.log(document.getElementById("c_stylized-img-ratio-2").value / 100);
  
  c_canvas_1.width = contentImg.width;
  c_canvas_1.height = contentImg.height;
  
  
  c_canvas_2.width = contentImg.width;
  c_canvas_2.height = contentImg.height;
  
  c_canvas_3.width = contentImg.width;
  c_canvas_3.height = contentImg.height;

/*   model.stylize(c_contentImg, c_styleImg_1).then(imageData => {
    c_ctx_1.putImageData(imageData, 0, 0);
    model.stylize(c_contentImg, c_styleImg_2).then(imageData_2 => {
        c_ctx_2.putImageData(imageData_2, 0, 0);
        model.stylize(imageData, imageData_2).then(imageData_3 => {
          c_ctx_3.putImageData(imageData_3, 0, 0);
          c_stopLoading();
        });
    });
  }); */

  model.stylize(c_contentImg, c_styleImg_1, document.getElementById("c_stylized-img-ratio-1").value / 100).then(imageData => {
   c_ctx_1.putImageData(imageData, 0, 0);
   model.stylize(c_contentImg, c_styleImg_2, document.getElementById("c_stylized-img-ratio-2").value / 100).then(imageData_2 => {
       c_ctx_2.putImageData(imageData_2, 0, 0);
       model.stylize(imageData, imageData_2, document.getElementById("c_stylized-img-ratio-3").value / 100).then(imageData_3 => {
         c_ctx_3.putImageData(imageData_3, 0, 0);
         c_stopLoading();
       });
   });
 });
  


}

async function startLoading() {
  loading.hidden = false;
  notLoading.hidden = true;

  canvas_1.style.opacity = 0;
  canvas_2.style.opacity = 0;
  

}

function stopLoading() {
  loading.hidden = true;
  notLoading.hidden = false;
  canvas_1.style.opacity = 1;
  canvas_2.style.opacity = 1;
  

}

async function b_startLoading() {
  b_loading.hidden = false;
  b_notLoading.hidden = true;

  
  b_canvas_1.style.opacity = 0;
  b_canvas_2.style.opacity = 0;
  //b_canvas_3.style.opacity = 0;
}

function b_stopLoading() {
  b_loading.hidden = true;
  b_notLoading.hidden = false;
  
  b_canvas_1.style.opacity = 1;
  b_canvas_2.style.opacity = 1;
  //b_canvas_3.style.opacity = 1;

}


async function c_startLoading() {
  c_loading.hidden = false;
  c_notLoading.hidden = true;

  
  c_canvas_1.style.opacity = 0;
  c_canvas_2.style.opacity = 0;
  c_canvas_3.style.opacity = 0;
}

function c_stopLoading() {
  c_loading.hidden = true;
  c_notLoading.hidden = false;
  
  c_canvas_1.style.opacity = 1;
  c_canvas_2.style.opacity = 1;
  c_canvas_3.style.opacity = 1;

}

function display_ratio(event) {
  document.getElementById("show-stylized-img-ratio-1").value =
    document.getElementById("stylized-img-ratio-1").value / 100;
  document.getElementById("show-stylized-img-ratio-2").value =
    document.getElementById("stylized-img-ratio-2").value / 100;
}

function b_display_ratio(event) {
  document.getElementById("b_show-stylized-img-ratio-1").value =
    document.getElementById("b_stylized-img-ratio-1").value / 100;
  document.getElementById("b_show-stylized-img-ratio-2").value =
    document.getElementById("b_stylized-img-ratio-2").value / 100;

}

function c_display_ratio(event) {
  document.getElementById("c_show-stylized-img-ratio-1").value =
    document.getElementById("c_stylized-img-ratio-1").value / 100;
  document.getElementById("c_show-stylized-img-ratio-2").value =
    document.getElementById("c_stylized-img-ratio-2").value / 100;
      document.getElementById("c_show-stylized-img-ratio-3").value =
    document.getElementById("c_stylized-img-ratio-3").value / 100;
}

$(".btn-transfer-1").click(function() {
  startLoading();
  model.initialize().then(() => {
    
    stylize();
  });

});

$(".btn-transfer-2").click(function() {
  b_startLoading();
  model.initialize().then(() => {
    b_stylize();
  });

});

$(".btn-transfer-3").click(function() {
  c_startLoading();
  model.initialize().then(() => {
    c_stylize();
  });

});

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
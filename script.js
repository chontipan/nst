const model = new mi.ArbitraryStyleTransferNetwork();
const canvas = document.getElementById("stylized");
const ctx = canvas.getContext("2d");

const canvas_2 = document.getElementById("stylized_2");
const ctx_2 = canvas_2.getContext("2d");

//const canvas_3 = document.getElementById("stylized_3");
//const ctx_3 = canvas_3.getContext("2d");

//const canvas_4 = document.getElementById("stylized_4");
//const ctx_4 = canvas_4.getContext("2d");

const contentImg = document.getElementById("content");
const styleImg = document.getElementById("style");

const styleImg_2 = document.getElementById("style_2");
const styleImg_3 = document.getElementById("style_3");

//const styleImg_4 = document.getElementById("style_4");

const loading = document.getElementById("loading");
const notLoading = document.getElementById("ready");

const loading_2 = document.getElementById("loading_2");
const notLoading_2 = document.getElementById("ready_2");

//const styleRatio = document.getElementById("stylized-img-ratio").value / 100;
//const styleRatio_2 =
//  document.getElementById("stylized-img-ratio-2").value / 100;
//setupDemo();

$(".btn-transfer").click(function() {
  model.initialize().then(() => {
    startLoading();
    stylize();
  });

  //stylize(contentImg,styleImg);
});

async function clearCanvas() {
  // Don't block painting until we've reset the state.
  await mi.tf.nextFrame();
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  ctx_2.clearRect(0, 0, canvas_2.width, canvas_2.height);
  //ctx_3.clearRect(0, 0, canvas_3.width, canvas_3.height);

  //ctx_4.clearRect(0, 0, canvas_4.width, canvas_4.height);
  await mi.tf.nextFrame();
}

async function stylize() {
  await clearCanvas();

  // Resize the canvas to be the same size as the source image.
  canvas.width = contentImg.width;
  canvas.height = contentImg.height;
  canvas_2.width = contentImg.width;
  canvas_2.height = contentImg.height;
  //canvas_3.width = contentImg.width;
  //canvas_3.height = contentImg.height;

  //canvas_4.width = contentImg.width;
  //canvas_4.height = contentImg.height;

  // This does all the work!
  //* @param content Content image to stylize
  // * @param style Style image to use
  // * @param strength If provided, controls the stylization strength.
  // * Should be between 0.0 and 1.0.
  //this.styleRatio = 1.0
  // this.styleRatioSlider = document.getElementById('stylized-img-ratio').value;
  //this.styleRatio=document.getElementById("stylized-img-ratio").value / 100;
  //this.styleRatio_2=document.getElementById("stylized-img-ratio-2").value / 100;
  console.log(document.getElementById("stylized-img-ratio").value / 100);
  console.log(document.getElementById("stylized-img-ratio-2").value / 100);

  model.stylize(styleImg, styleImg_2, document.getElementById("stylized-img-ratio").value / 100).then(imageData => {
    ctx.putImageData(imageData, 0, 0);
    model
      .stylize(contentImg, imageData, document.getElementById("stylized-img-ratio-2").value / 100)
      .then(imageData_2 => {
        ctx_2.putImageData(imageData_2, 0, 0);
        //model.stylize(imageData, imageData_2,this.styleRatio).then(imageData_3 => {
        //ctx_3.putImageData(imageData_3, 0, 0);
        //model.stylize(imageData_3, styleImg_3,this.styleRatio).then(imageData_4 => {
        //ctx_4.putImageData(imageData_4, 0, 0);
        stopLoading();
        //});

        //});
      });
  });

  //model.stylize(styleImg, styleImg_2,this.styleRatio).then(imageData => {
  // ctx_3.putImageData(imageData, 0, 0);

  //});
}

function loadImage(event, imgElement) {
  const reader = new FileReader();
  reader.onload = e => {
    imgElement.src = e.target.result;

    imgElement.width = 384;
    imgElement.height = 384;
    //startLoading();
    //stylize();
  };
  reader.readAsDataURL(event.target.files[0]);
}

function display_ratio(event) {
  document.getElementById("show-stylized-img-ratio").value =
    document.getElementById("stylized-img-ratio").value / 100;
  document.getElementById("show-stylized-img-ratio-2").value =
    document.getElementById("stylized-img-ratio-2").value / 100;
}

function loadContent(event) {
  loadImage(event, contentImg);
  //resetScreen()
}

function loadStyle(event) {
  loadImage(event, styleImg);
  //resetScreen()
}

function loadStyle_2(event) {
  loadImage(event, styleImg_2);
  //resetScreen()
}

//function loadStyle_3(event) {
//  loadImage(event, styleImg_3);
//  resetScreen()
//}

//function loadStyle_4(event) {
//  loadImage(event, styleImg_4);
//  resetScreen()
//}

function resetScreen() {
  loading.hidden = true;
  notLoading.hidden = true;
  loading_2.hidden = true;
  notLoading_2.hidden = true;
  //document.getElementById('stylized-img-ratio').value=50;
  //document.getElementById('stylized-img-ratio-2').value=50;
  //display_ratio()
  clearCanvas();
}

function startLoading() {
  loading.hidden = false;
  notLoading.hidden = true;
  loading_2.hidden = false;
  notLoading_2.hidden = true;

  canvas.style.opacity = 0;
  canvas_2.style.opacity = 0;

  //canvas_3.style.opacity = 0;
  //canvas_4.style.opacity = 0;
}

function stopLoading() {
  loading.hidden = true;
  notLoading.hidden = false;
  loading_2.hidden = true;
  notLoading_2.hidden = false;
  canvas.style.opacity = 1;
  canvas_2.style.opacity = 1;

  //canvas_3.style.opacity = 1;
  // canvas_4.style.opacity = 1;
}

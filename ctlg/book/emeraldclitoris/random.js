const random = [
  "/ctlg/book/emeraldclitoris/10005.jpg",
  "/ctlg/book/emeraldclitoris/dinami.gif",
  "/ctlg/book/emeraldclitoris/sny4.jpg",
  "/ctlg/book/emeraldclitoris/sny6.jpg",
  "/ctlg/book/emeraldclitoris/sny9.jpg",
  "/ctlg/book/emeraldclitoris/sny12.jpg"
  ];
  
  function randomImg(randomArray) {
    var random =
    randomArray[Math.floor(Math.random() * randomArray.length)];
    console.log(random);
    return random;
  }
  function sentenceGenerator() {
    var sentence = `<img src="${randomImg(random)}">`;
    document.querySelector(".random").innerHTML = sentence;
  }
  window.setInterval(function() {
    sentenceGenerator();
  }, 2000);
  sentenceGenerator();
  
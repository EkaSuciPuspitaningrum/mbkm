let eles = document.getElementById("qr");
console.log(url);
let qrOptions = {
    text: url,
    height: 128,
    width: 128,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
}
let qrCode = new QRCode(eles, qrOptions);

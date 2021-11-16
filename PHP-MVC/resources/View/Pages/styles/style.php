<?php
  header('Content-type: text/css');
?>

* {
  margin: 0;
  padding: 0;
  font-family: "Open Sans", sans-serif;
}

.header {
  min-height: 100vh;
  width: 100%;
  background-image: linear-gradient(rgba(4, 9, 30, 0.7), rgba(4, 9, 30, 0.7)),
    url(../Images/tema.jpg);
  background-position: center;
  background-size: cover;
  position: relative;
}

nav {
  display: flex;
  padding: 2% 6%;
  justify-content: space-between;
  align-items: center;
}

nav img {
  width: 150px;
}

.nav-links {
  flex: 1;
  text-align: right;
}

.nav-links ul li {
  list-style: none;
  display: inline-block;
  padding: 8px 12px;
  position: relative;
}

.nav-links ul li a {
  color: #fff;
  text-decoration: none;
  font-size: 13px;
}

.nav-links ul li::after {
  content: "";
  width: 0%;
  height: 4px;
  background: #325b92;
  display: block;
  margin: auto;
  transition: 0.3s;
}

.nav-links ul li:hover::after {
  width: 100%;
}

.text-box {
  width: 90%;
  color: #fff;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.text-box h1 {
  font-size: 62px;
}

.text-box p {
  margin: 10px 0 40px;
  font-size: 14px;
  color: #fff;
}

nav .fas {
  display: none;
}

@media (max-width: 700px) {
  .text-box h1 {
    font-size: 20px;
  }
  .text-box p {
    margin: 10px 0 40px;
    font-size: 12px;
    color: #fff;
  }
  .nav-links ul li {
    display: block;
  }
  .nav-links {
    position: absolute;
    background: #325b92;
    height: 100vh;
    width: 200px;
    top: 0;
    right: -200px;
    text-align: left;
    z-index: 2;
    transition: 0.2s;
  }
  nav .fas {
    display: block;
    color: #fff;
    margin: 10px;
    font-size: 22px;
    cursor: pointer;
  }
  .nav-links ul {
    padding: 20px;
  }
  .row {
    flex-direction: column;
  }
}

/* Gif css */

.gif {
  min-height: 100vh;
  width: 100%;
  background-image: url(../Images/peg-gif3.gif);
  background-position: center;
  background-size: 80% 40%;
  position: relative;
  background-repeat: no-repeat;
}

/* Destinos CSS */

.destinos {
  width: 80%;
  margin: auto;
  text-align: center;
  padding-top: 20px;
}

.destinos h1 {
  font-size: 36px;
  font-weight: 600;
}

.destinos p {
  color: #777;
  font-size: 18px;
  font-weight: 300;
  line-height: 22px;
  padding: 10px;
}

.row {
  margin-top: 5%;
  display: flex;
  justify-content: space-between;
}

.destino-col {
  flex-basis: 32%;
  border-radius: 10px;
  margin-bottom: 30px;
  position: relative;
  overflow: hidden;
}

.destino-col img {
  width: 100%;
  height: 100%;
  display: block;
}

.layer {
  background: transparent;
  height: 100%;
  width: 100%;
  position: absolute;
  top: 0;
  left: 0;
  transition: 0.3s;
}

.layer:hover {
  background: rgba(255, 255, 255, 0.4);
}

.layer h3 {
  width: 100%;
  font-weight: 500;
  color: #fff;
  font-size: 26px;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  position: absolute;
  text-shadow: 2px 2px 4px #000000;
}

/* footer css */

footer {
  margin: 15px;
  width: 100%;
  text-align: center;
  padding: 30px 0;
}

footer h4 {
  border-top: 1px solid black;
  padding-top: 10px;
  margin-bottom: 10px;
  margin-top: 30px;
  font-weight: 600;
  color: rgba(0, 0, 0, 0.9);
}

.icons .fab {
  margin: 0 13px;
  cursor: pointer;
  padding: 18px 0;
}

/* contato css */

.contact-header {
  height: 50vh;
  width: 100%;
  background-image: linear-gradient(rgba(4, 9, 30, 0.7), rgba(4, 9, 30, 0.7)),
    url(../Images/tema.jpg);
  background-position: center;
  background-size: cover;
  position: relative;
  text-align: center;
  color: #fff;
}

.contact-header h1 {
  margin-top: 100px;
}

/* Form css */

.form-contato {
  border: 1px solid #ccc;
  height: 70%;
  width: 80%;
  margin: auto;
  padding: 10px 20px;
  border-radius: 5px;
}

.form-contato h3 {
  text-align: center;
  font-size: 30px;
  margin: 20px;
}

.form-contato input,
.form-contato textarea {
  width: 100%;
  padding: 10px;
  margin: 15px 0;
  box-sizing: border-box;
  border: 0.5px solid black;

  background: #f0f0f0;
}

.calendar {
  display: flex;
  justify: space-between;
  width: 50%;
}
.calendario {
  padding-right: 3px;
}

.botao {
  display: inline-block;
  text-decoration: none;
  color: #000000;
  border: 1px solid #000000;
  padding: 6px 17px;
  font-size: 12px;
  font-weight: 500;
  background: transparent;
  position: relative;
  cursor: pointer;
  border-radius: 5px;
}

.botao:hover {
  border: 1px solid #a3e4d7;
  background: #a3e4d7;
  transition: 0.5s;
}

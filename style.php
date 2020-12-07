<?php
header("content-type: text/css; charset: utf-8");
 ?>


   h1 {

    padding:80px;
    font-size:60px;
    display:block;
    text-align: center;
    margin:0px;

   }


  .grid {
    display:grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
    border:3px solid black;
    text-align:center;
    height: 35px;
    line-height:35px;
    text-shadow:5px 7px 10px pink;
    border-bottom:0px;
    font-weight:bold;
    font-size:22px;

   }



   @media(min-width: 900px){
     .grid{
       width:900px;
       margin-left: auto;
       margin-right: auto;
     }
   }


  .active{
      font-size:0;
    }


  a {
     text-decoration: none;
     color: black;
      }


 h3{
  text-align: center;
  margin:120px;
  font-size: 40px;

  }


  h4{
    text-align: center;
    font-size: 20px;
  }
  h5{
    font-size: 35px;
    text-align: center;
    text-shadow:5px 5px 10px pink
  }


  .login{
    width:300px;
    margin-left:auto;
    margin-right: auto;
    font-size: 20px;
    border-top: 5px double black;
    border-bottom: 5px double black;
    padding-top: 45px;
    padding-bottom: 45px;
    text-shadow:5px 7px 10px pink;


  }


  .box{
    width:292px;
    border-color: pink;
    background-color: lightpink;
  }


  button{
padding:6px;
width:150px;

  }


  #but{
  margin-top: 10px;
  display:grid;
  grid-template-columns: 1fr 1fr;


  }


  .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
  }

  /* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */

}

.modal span{
display:block;
  position:relative;
text-align: right;
right:20px;
  font-size: 30px;
  font-weight: bold;
  color:black;
}


.underword{
  text-align: center;
  font-size: 20px;
  padding-top:50px;
  text-shadow:5px 7px 10px pink;

}


.container p{
  text-align: center;
}


.inerbox{
  width:400px;
  margin-left: auto;
  margin-right: auto;
}


.inerbox input{
  width:130px;
}


.inerbut{
  display:grid;
  grid-template-columns: 1fr 1fr;
  width:400px;
  margin-left: auto;
  margin-right: auto;

}


.inerbut button{

  padding:10px;

  width:200px;
}


.inerbox input{

  height:28px;
  width:300px;
margin-left: 45px;
}


img{
  display:block;
  width:300px;
  height:300px;
  margin-left: auto;
  margin-right: auto;
}


.datainput{
  display:grid;
  grid-template-columns: 125px 700px 56px;
  grid-gap: 15px;
  justify-content:center;
  height:30px;
line-height: 30px;
}


.smallmenu{
  display:grid;
  grid-template-columns: 150px 150px 150px;
  grid-gap :30px;
  justify-content: center;
  text-align: center;
  text-shadow:7px 10px 10px pink;
  font-size:19px;
  font-weight:bold;

}



.uline{
  width:900px;

}



.oneline{

  list-style-position: outside;
letter-spacing: 1px;
  margin-left:480px;
  margin-right:480px;


}





@media(max-width: 1380px){
  .oneline{
    margin-left: 250px;
    margin-right: 250px;
  }
}

@media(max-width: 900px){
  .oneline{
    margin-left: 100px;
    margin-right: 100px;
  }
}








body{

  position:relative;
  z-index:1;
}


body:after{
  background-image:url("flower.jpg");
    top:0;
    left:0;
    position: fixed;
    background-size:100%;
    opacity:0.2!important;
    z-index: -1;
    content:"";
    width:100%;
    height:100%;

}

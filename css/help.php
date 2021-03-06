body {
 margin: 0;
 padding: 0;
 font-family: Verdana, Geneva, sans-serif;
}

a{
  text-decoration: none;
  color: black;
}

.marginless{
  margin: 0;
}

.login{
  position: absolute;
  width: 40%;
  margin: 20vh 30%;
  background-color: white;
  z-index: 5;
  text-align: center;
  border-radius: 20px;
}

.signup{
  position: absolute;
  width: 40%;
  margin: 20vh 30%;
  background-color: white;
  z-index: 5;
  text-align: center;
  border-radius: 20px;
}

.fieldname{
  text-align: left;
}

.layout{
  position: fixed;
  width: 100%;
  height: 100vh;
  background-image: url(mbg.jpg);
  background-size: cover;
  z-index: 0;
}

.user-menu{
  position:relative;
  margin: 0 25% 1% 25%;
  padding: 0 1%;
  width: 48%;
  height: 5vh;
  background-color: white;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
}

.menu-panel{
  position: sticky;
  top: 0;
  background-color: white;
  margin: 0% 25%;
  width: 50%;
  z-index: 2;
  border-radius: 20px;
  border-bottom: 1px solid lightgrey;
  border-top: 1px solid lightgrey;
}

.menu-panel ul{
    display: grid;
    grid-template-columns: repeat(4, 25%);
    margin: 0;
    padding: 0;
}

.menu-panel ul a{
  margin: 0 auto;
  line-height: 5vh;
  list-style: none;
  width: 100%;
  text-align: center;
  border-radius: 19px;
}

.menu-panel ul a:hover{
  background-color: lightpink;
  color: white;
}

.user-menu-panel ul a:hover{
  text-decoration: underline;
  transform: scale(1.2);
}

.user-menu-panel span:hover{
  transform: scale(1.2);
}

.user-menu-panel-mylenta{
  float:left;
  line-height: 5vh;
  margin: 0;
  width: 100px;
  text-align: center;
}

.user-menu-panel ul{
  float: right;
  padding: 0;
  margin: 0;
  display: flex;
}

.user-menu-panel ul li{
  margin: 0 10px;
  text-align: right;
  line-height: 5vh;
  list-style: none;
}

.tabs-body{
  position: relative;
  background-color: white;
  margin: 1% 25% 1% 25%;
  width: 50%;
  border-radius: 40px;
  z-index: 1;
}

.news{
  position: relative;
  padding: 5%;
}

.news-item{
  height: auto;
}

.news-item-figure{
  margin: auto;
}

.news-item-figcaption{
  margin: 10px 0;
}

.figure-content-link-img{
  max-width: 100%;
  max-height: 50vh;
  display: block;
  margin: 3px auto;
}

.news-item-footer{
  height: 4vh;
  border-top: 2px solid lightgrey;
  border-bottom: 2px solid lightgrey;
}

.voting{
  width: auto;
  margin: 4px;
}

.footer-img{
  margin: 0 3px;
  height: 3vh;
}

.voting-plus{
  float:right;
}

.voting-minus{
  float:right;
}

.view-count{
  float: left;
  height: 4vh;
}

.view-count-value{
  float: left;
  line-height: 3vh;
}

.form{
  cursor: pointer;
}

.new-conteiner{
  position: relative;
  background-color: white;
  margin: 0% 25% 0% 25%;
  padding: 1% 2%;
  border-radius: 40px;
  z-index: 1;
}

.new-body{
  margin-top: 2%;
  margin-left: 5%;
}

.new-title{
  margin: 0;
  padding: 0;
  width: auto;
  border-bottom: 1px solid black;
}

.new-img{
  max-height: 50vh;
  max-width: 100%;
}

.new-description{
  margin-top: 2%;
}

.tags{
  position: relative;
  display: grid;
  grid-template-columns: 1fr 1fr;
}

.tags-body{
  position: relative;
  background-color: white;
  margin: 1% 25% 0% 25%;
  padding: 2%;
  width: 46%;
  border-radius: 40px;
  z-index: 1;
}

.tag{
  height: 7vh;
  margin: 5px 5px;
  border-radius: 10px;
  border: 1px solid grey;
}

.addbtn{
  height: 5vh;
  float: right;
  margin: 9px 5px;
}

.tag-span{
  float:left;
  line-height: 7vh;
  margin: 0 10px;
}

.tag-notlog{
  width: 100%;
  height: 7vh;
  line-height: 7vh;
  text-align: center;
  font-weight: bold;
  font-size: 1.3em;
  border-radius: 9px;
}

.tag a:hover > .tag-notlog{
  background-color: lightblue;
  text-decoration: underline;
}

.tag-title{
  margin: 0;
  line-height: 4vh;
}

video{
  align-content: center;
  width: 100%;
}

.about h2{
  margin: 0;
  margin-bottom: 3%;
}

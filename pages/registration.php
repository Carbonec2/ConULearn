<style type="text/css">
#btnSignup{
    width: 100%;
    background-color: #66d9ff;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input.standardField{
     width: 25%;
  background-color: #ffffff;
  padding: 12px 20px;
   margin: 8px 0;
   border: 1px solid #ccc;
   border-radius: 4px;
    box-sizing: border-box;
}
#mainPanel{
    background-color: #d9d9d9;
}
</style>

<div id="mainPanel" class="container-fluid text-center">
    <div id="messageBox"></div><br/>
    <input type="text" class="standardField" id="txtUser" placeholder="Username" style="border-radius:4px;padding:5px; display:inline-block;"/>
    <br/>
    <input type="password" class="standardField" id="txtPassword" placeholder="Password" style="border-radius:4px;padding:5px; display:inline-block;"/>
    <br/>
       <input type="password" class="standardField" id="txtConfirmPassword" placeholder="Confirm Your Password" style="border-radius:4px;padding:5px; display:inline-block;"/>
    <br/>
    <input type="button" value="Sign up" id="btnSignup" style="width:100px; height:50px; display:inline-block; margin:10px;"/>
</div>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;700&display=swap" rel="stylesheet">
<style>
    .header{
        height: 150px;
        background-color:darkslategray;
        color:white;
        font-family: 'Quicksand', sans-serif;
    }
    #Logo{
        position: absolute;
        width: 100px;
        height: 100px;
        background-image: url("images/icon.png");
        background-size: contain;
        border-radius:45px;
        left:25px;
        top:25px;
    }
    button{
        width: 100px;
        height: 30px;
        background-color: darkslategray;
        border: none;
        color: white;
        font-size: 30px;
        font-family: 'Quicksand', sans-serif;
        font-weight: bold;
        transition: 0.5s;
    }
    #buttonHome{
        position: absolute;
        left: 550px;
        top:50px;
    }
    #buttonHome :hover{
        cursor: pointer;
        color: rgb(188, 239, 156);
    }
    #buttonProfile{
        position: absolute;
        left: 700px;
        top:50px;
    }
    #buttonProfile :hover{
        cursor: pointer;
        color: rgb(188, 239, 156);
    }
    #buttonLogout{
        position: absolute;
        left: 1150px;
        top:50px;
    }
    #buttonLogout :hover{
        cursor: pointer;
        color: rgb(188, 239, 156);
    }
    #pembatas{
        position: absolute;
        left: 1027px;
        top:50px;
        width:1px;
        height: 50px;
        background-color: white;
    }
</style>

<div class="header">
    <div id="Logo"></div>
    @if(isset($userLogin))
        <div id="buttonLogout"><a href="http://localhost:8000/logout"><button>Logout</button></a></div>
        <div id="buttonProfile"><a href="http://localhost:8000/profile"><button>Profile</button></a></div>
        <div id="buttonHome"><a href="http://localhost:8000/home"><button>Home</button></a></div>
    @else
        <div id="buttonLogout"><a href="http://localhost:8000/login"><button>Login</button></a></div>
        <div id="buttonHome" style="left: 630px;"><a href="http://localhost:8000/home"><button>Home</button></a></div>
    @endif


        <div id="pembatas"></div>


</div>


<style>
  .mask_container {
    background: linear-gradient(130deg, #e11111, #576363, #00B7C4, #0c4128, #4f5050);
    background-size: 300% 300%;
    -webkit-animation: Animation 6s ease infinite;
    -moz-animation: Animation 6s ease infinite;
    animation: Animation 6s ease infinite;
  }

  #logo {
    mask-image: url('/images/logo.svg');
    -webkit-mask-image: url('/images/logo.svg');
  }

  .mask_container {
    -webkit-mask-position: center;
    -webkit-mask-size: contain;
    -webkit-mask-type: alpha;
    mask-size: contain;
    mask-type: alpha;
    mask-mode: alpha;
    width: 5em;
    height: 5em;
    mask-repeat: no-repeat;
    mask-position: center;
    background-color: #576363;
  }

  @media (max-width: 979px) {
    .mask_container {
      width: 2em;
      height: 2em;
    }
  }

  @-webkit-keyframes Animation {
    0% {
      background-position: 10% 0
    }

    50% {
      background-position: 91% 100%
    }

    100% {
      background-position: 10% 0
    }
  }

  @-moz-keyframes Animation {
    0% {
      background-position: 10% 0
    }

    50% {
      background-position: 91% 100%
    }

    100% {
      background-position: 10% 0
    }
  }

  @keyframes Animation {
    0% {
      background-position: 10% 0
    }

    50% {
      background-position: 91% 100%
    }

    100% {
      background-position: 10% 0
    }
  }

  @media screen and (max-width: 769px) {
    .nav-link {
      width: 100%;
    }

    .mask_holder {
      flex-direction: row;
      width: 100%;
    }

    .mask_container {
      margin-right: 10px;
    }
  }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">
    <!--        <img src="/images/logo.svg" width="300" height="60" alt="">-->
    <div class="mask_container" id="logo"></div>

  </a>
  <a class="navbar-brand" href="/"><img src="/images/logo_2.png" width="90" height="90" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      
    </ul>
  </div>
  <div class="navbar-collapse collapse order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#"><span id="span"></span></a>
            </li>
        </ul>
    </div>
</nav>
<script>
  var span = document.getElementById('span');

function time() {
  var d = new Date();
  var s = d.getSeconds();
  var m = d.getMinutes();
  var h = d.getHours();
  span.textContent = 
    ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2);
}

setInterval(time, 1000);
</script>
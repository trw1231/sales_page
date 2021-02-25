<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Package-show</title>
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <style>
        section.pricing {
        background: #d0d0ce;
        
        }

        .pricing .card {
        border: none;
        border-radius: 1rem;
        transition: all 0.2s;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
        }

        .pricing hr {
        margin: 1.5rem 0;
        }

        .pricing .card-title {
        margin: 0.5rem 0;
        font-size: 0.9rem;
        letter-spacing: .1rem;
        font-weight: bold;
        }

        .pricing .card-price {
        font-size: 3rem;
        margin: 0;
        }

        .pricing .card-price .period {
        font-size: 0.8rem;
        }

        .pricing ul li {
        margin-bottom: 1rem;
        }

        .pricing .text-muted {
        opacity: 0.7;
        }

        .pricing .btn {
        font-size: 80%;
        border-radius: 5rem;
        letter-spacing: .1rem;
        font-weight: bold;
        padding: 1rem;
        opacity: 0.7;
        transition: all 0.2s;
        }
        body,html {
        height: 100%;
        }

        /* Hover Effects on Card */

        @media (min-width: 992px) {
        .pricing .card:hover {
            margin-top: -.25rem;
            margin-bottom: .25rem;
            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
        }
        .pricing .card:hover .btn {
            opacity: 1;
        }
        }
    </style>
</head>
<body>
    <!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

<section class="pricing h-100">
    <h1 class="text-light text-center py-4">โปรดเลือก Package</h1>
    <div class="container">
      <div class="row">
        <!-- Free Tier -->
        @foreach($package as $pk)
        <div class="col-lg-6 pt-4">
          <div class="card mb-5 mb-lg-0">
            <div class="card-body">
              <h5 class="card-title text-muted text-uppercase text-center">{{$pk->name_package}}</h5>
              <h6 class="card-price text-center">{{$pk->price}} บาท<span class="period">/เดือน</span></h6>
              <hr>
              <ul class="fa-ul">
                <li><span class="fa-li"><i class="fas fa-check"></i></span>สร้าง Page ได้ {{$pk->page_count}} หน้า</li>
                
              </ul>
              <div class="text-center">
                <a href="{{route('package.confirm',$pk->id)}}" class="btn btn-block btn-primary text-uppercase">Button</a>
              </div>
              
            </div>
          </div>
        </div>
        @endforeach

     
      </div>
    </div>
  </section>
</body>
</html>
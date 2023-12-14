<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        body {
            background-color: #f8f9fa;
            /* Màu nền nhạt nhẹ */
            background-image: url('images/bg11.jpg');
            /* Đường dẫn đến ảnh nền */
            background-size: cover;
            /* Đảm bảo ảnh nền trải đều trên toàn bộ màn hình */
            background-repeat: no-repeat;
            /* Không lặp lại ảnh nền */
        }

        .container-fluid {
            background-color: rgba(255, 255, 255, 0.8);
            /* Nền container trắng với độ trong suốt */
            border-radius: 10px;
            /* Góc bo tròn cho container */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Đổ bóng nhẹ */
            padding: 20px;
            /* Khoảng cách giữa nội dung và mép container */
            margin-top: 20px;
            /* Khoảng cách từ container đến đỉnh màn hình */
        }

        .table th,
        .table td {
            text-align: center;
            /* Căn giữa nội dung trong ô */
        }

        .table-hover tbody tr:hover {
            background-color: rgba(248, 249, 250, 0.8);
            /* Hiệu ứng hover với độ trong suốt */
        }

        .hover-effect:hover {
            transform: scale(1.05);
            /* Hiệu ứng phóng to khi hover */
            transition: transform 0.3s ease;
            /* Thời gian và kiểu chuyển động */
        }

        /* Update the CSS */
        .home-icon {
            font-size: 30px;
            position: absolute;
            top: 10px;
            /* Adjust the vertical position to center */
            transform: translateY(-50%);
            /* Center the icon vertically */
            right: 20px;
            /* Adjust the distance from the right */
            color: #e57a1c;
            /* Màu cam đậm */
        }

        .home-icon:hover {
            color: #ffd700;
        }


        .download-link {
            margin-left: 10px;
            padding: 10px 20px;
            /* Add padding to the button */
            background-color: #0dd43c;
            /* Set a background color */
            color: #fff;
            /* Set text color */
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            /* Add a smooth transition for background color */
        }

        .download-link:hover {
            background-color: #06f0c5;
            /* Darker color on hover */
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <div class="container-fluid mx-3 animated fadeIn flex-grow-1">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <a href="{{ route('index') }}" class="home-icon">
                    <i class="fas fa-home"></i>
                </a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Source</th>
                            <th>Poster</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover-effect">
                            <td>{{ $info->name }}</td>
                            <td>{{ $info->category->name }}</td>
                            <td>
                                <audio controls controlsList="nodownload">
                                    <source src="{{ URL::to('/uploads/songs') }}/{{ $info->source }}" type="audio/mpeg">
                                </audio>
                            </td>
                            <td>
                                <img width="80" class="img-fluid"
                                    src="{{ URL::to('/uploads/images') }}/{{ $info->poster_music }}" />
                            </td>
                            <td>
                                {{ number_format($info->price) }}
                            </td>
                            <td>
                                {{ $info->status == 1 ? 'Active' : 'Deactive' }}
                            </td>
                            @if (Session::has('username'))
                                <a href="{{ URL::to('/uploads/songs') }}/{{ $info->source }}" download>Download</a>
                            @else
                                <a href="{{ route('fr.download.song', ['id' => $info->id]) }}">Download</a>
                            @endif
                            <br>
                            @if (Session::has('error_download'))
                                <p class="text-danger">{{ Session::get('error_download') }}</p>
                                <a href="{{ route('user.login') }}"> Login</a>
                            @endif


                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.0/gsap.min.js"></script>
    <script>
        gsap.from(".animated", {
            opacity: 0,
            duration: 1,
            delay: 0.5,
            ease: "power2.out"
        });
    </script>
</body>

</html>

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

        .home-icon {
            font-size: 24px;
            margin-right: 10px;
            color: #007bff;
            /* Màu của icon home */
        }

        .home-icon:hover {
            color: #e57a1c;

        }
    </style>
</head>

<body>

    <div class="container-fluid mx-3 animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <a href="{{ route('index') }}" class="home-icon">
                    <i class="fas fa-home"></i>
                </a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Source</th>
                            <th>Poster</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($song as $item)
                            <tr class="hover-effect">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>
                                    <audio controls>
                                        <source src="{{ URL::to('/uploads/songs') }}/{{ $item->source }}"
                                            type="audio/mpeg">
                                    </audio>
                                </td>
                                <td>
                                    <img width="80" class="img-fluid"
                                        src="{{ URL::to('/uploads/images') }}/{{ $item->poster_music }}" />
                                </td>
                                <td>
                                    {{ number_format($item->price) }}
                                </td>
                                <td>
                                    {{ $item->status == 1 ? 'Active' : 'Deactive' }}
                                </td>
                                <!-- Inside the loop for each song -->
                            

                            </tr>
                        @endforeach
                    </tbody>
                </table>
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

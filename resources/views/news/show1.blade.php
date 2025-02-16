@vite('resources/scss/news.scss')
@extends('layouts.new')

@section('content')
<!-- <div class="container mt-4"> -->
    <!-- <h1 class="text-primary fw-bold">Sơ Mi Denim - Biểu Tượng Mạnh Mẽ & Phá Cách</h1>
    <p class="text-muted fst-italic">Denim - từ chất vải lao động đến biểu tượng thời trang</p> -->
    <div class="news-item mb-4">
        <a href="{{ route('news.show1', ['slug' => $new->slug]) }}">
            <h1 class="text-dark fw-bold ">{{ $new->title }}</h1>
        </a>

        <br>
        <p class="text-muted fst-italic">Ngày đăng: {{ $new->created_at->format('d/m/Y') }}</p>

        <img src="{{ asset('uploads/news/' . $new->image) }}" alt="{{ $new->title }}" class="img-fluid mb-3">

        <!-- <p>{!! $new->content !!}</p> -->
    <!-- </div> -->
    <div class="content">
        <p>{!! $new->detail !!}</p>
        <!-- <p>Denim được coi là chất vải dành cho người lao động và biểu hiện của sự phá cách, bền bỉ, mạnh mẽ. Bản chất cứng cáp, thô mộc dẫn lối denim đến với sản phẩm may mặc dành cho nam giới, trước khi "tán tỉnh" và chinh phục dòng sản phẩm dành cho nữ giới.</p>

        <p>Cách đây vài thập kỷ, khi denim còn hạn chế về chất liệu, nam giới chủ yếu chuộng những chiếc quần jeans dáng thụng, giúp họ thoải mái hoạt động mà không lo dễ sờn rách. Sau đó, sự xuất hiện của dòng denim mềm nhẹ, denim co giãn, denim xước... với nhiều sắc độ xanh khác nhau tạo cơ hội phát triển cho áo sơ-mi nam. Các chàng có thể thỏa sức biến tấu denim theo cách riêng khoe cá tính.</p>

        <p>Diện sơ-mi denim, chàng trai "nữ tính" nhất cũng trở nên khỏe khoắn, năng động và đàn ông hơn. Sơ mi denim không kén người mặc, cũng không hạn chế về lứa tuổi, nhưng phải thừa nhận rằng nam giới diện kiểu áo này đẹp nhất khi vóc dáng hoàn toàn trưởng thành.</p>

        <p>Kiểu dáng dành cho sơ-mi denim nam hiện nay thiên về phom ôm sát cơ thể, tôn lên body. Thiết kế sơ-mi denim nam thường có cổ áo bẻ, túi ngực và phần thân lượn eo. Tuy nhiên, áo vẫn giữ được nét cứng cáp nhờ đường gân áo, đường viền gấu may bằng chỉ bò.</p>

        <p>Sơ-mi denim có thể mix theo nhiều phong cách khác nhau, tùy vào sở thích và cá tính người mặc. Với chàng chuộng style Hàn Quốc, có thể kết hợp sơ-mi denim xanh lơ chất mỏng nhẹ, không túi, kết hợp cùng quần jeans rách và giày lười. Với chàng thích sự đơn giản, tiện lợi và khỏe khoắn nên chọn sơ-mi denim xanh sậm có túi ngực, phần vai áo được trần chỉ nổi cùng với quần jeans thụng và giày thể thao (hoặc quần kaki thụng tối màu và giày da nâu).</p>

        <p>Ngoài những chiếc áo cơ bản như sơ-mi trắng, sơ-mi xanh, sơ-mi đen, trong tủ đồ của quý ông cũng nên "thủ" ít nhất một chiếc sơ-mi denim. Khi kết hợp với quần kaki và giày da lộn vào mùa nóng, hay diện bên trong áo vest vào mùa lạnh đều mang đến vẻ lịch lãm và mạnh mẽ.</p> -->
    </div>
</div>
@endsection
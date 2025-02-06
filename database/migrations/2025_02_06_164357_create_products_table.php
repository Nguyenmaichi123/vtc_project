<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('long_desc')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('type');
            $table->string('img')->nullable();
            $table->text('short_desc')->nullable();
            $table->timestamps();
        });

        
        DB::table('products')->insert([
            [
                'name' => 'Áo somi caro Tommy Hilfiger',
                'long_desc' => 'Áo sơmi là trang phục lịch sự, trang nhã, luôn đem lại phong cách thanh lịch cho nam giới. Tuy được sử dụng rộng rãi nhưng việc lựa chọn áo sơmi sao cho phù hợp với mỗi người thì không phải là chuyện nhỏ.
',
                'price' => 50,
                'type' => 'shirt',
                'img' => 'somicaro.png',
                'short_desc' => 'Áo sơmi là trang phục lịch sự, trang nhã, luôn đem lại phong cách thanh lịch cho nam giới. Tuy được sử dụng rộng rãi nhưng việc lựa chọn áo sơmi sao cho phù hợp với mỗi người thì không...',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Quần jean mài Only & Sons',
                'long_desc' => 'Vẻ năng động mạnh mẽ của nam giới có phần không nhỏ nhờ những chiếc quần jean. Với xu hướng rộng khắp của hàng loạt loại jean như jean rách, jean ống đứng, jean ống côn… phái mạnh sẽ chọn loại quần nào để thêm nam tính?
Các chàng trai cũng đừng quên chọn cho mình những chiếc quần jeans hợp mốt. Đặc biệt ngày nay, quần jeans của nam giới không chỉ có ống đứng dạng to và rộng, chúng đã được “cải tiến” thành những chiếc quần ống nhỏ, ống loe hợp hơn nhưng vẫn tạo sự thoải mái và thể hiện được cá tính mạnh mẽ. Quần jean nam là một item quen thuộc của thời trang nam chúng không hề chỉ là những kiểu dáng đơn giản như mọi người vẫn thường nghĩ. Quần jean nam ngày càng được thiết kế đa dạng hơn với nhiều kiểu dáng để tạo ra nhiều phong cách thời trang cho nam giới. Bạn có thể dễ dàng tìm thấy nhiều kiểu dáng quần jean nam trên thị trường hiện nay như: Jeans ống đứng, Jeans skinny, Jeans ống rộng, jeans có túi hậu, Jeans ống loe, Jean rách, Jeans cạp trễ, Jean mài…
Quần jean nam thường được may từ chất liệu jean mềm dễ chịu và thông thoáng tạo cảm giác thoải mái khi mặc và dễ dàng cho mọi hoạt động. Các chàng có thể phối cùng nhiều kiểu áo thun, áo pull khỏe khoắn hoặc sơ mi thanh lịch, để có một diện mạo hoàn hảo nhất.',
                'price' => 40,
                'type' => 'pants',
                'img' => 'quanjeanmai.png',
                'short_desc' => 'Vẻ năng động mạnh mẽ của nam giới có phần không nhỏ nhờ những chiếc quần jean. Với xu hướng rộng khắp của hàng loạt loại jean như jean rách, jean ống đứng, jean ống côn… phái mạnh sẽ chọn...',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Kính mắt gọng vuông Ray-Ban',
                'long_desc' => 'Với cảm hứng từ thiết kế của dòng kính Wayfarer cổ điển, Ray-Ban giới thiệu một chiếc kính Wayfarer khác với khung kính nhỏ và các đường nét mềm mại hơn. Hoàn hảo với tròng kính polarized chống tia UV, khung kính họa tiết đồi mồi cho một phong cách quyến rũ
- Khung kính nhựa cao cấp dáng vuông họa tiết đồi mồi
- Tròng kính polarized nâu loang màu
- Đệm mũi liền thân kính
- Đầu gọng kính uốn cong đính tên thương hiệu
- Chống tia UV 100%
Kính Ray-Ban chính là một biểu tượng thời trang và khẳng định phong cách sống với lịch sử ra đời từ hơn 70 năm trước. Từ sản phẩm mắt kính Aviator đến kính Wayfarer và nhiều loại kính huyền thoại khác, Ray-Ban đã tạo nên một trào lưu văn hóa lan tỏa mạnh mẽ đến nhiều tầng lớp khác nhau, dù là Hollywood hay trong quân đội Mỹ. Theo đuổi thông điệp “Never hide” - “Không bao giờ che giấu”, Ray-Ban đã và đang là sản phẩm không thể thiếu dành cho những ai yêu thích sự chân thực, muốn thể hiện cái tôi độc lập và khác biệt của mình.',
                'price' => 100,
                'type' => 'glasses',
                'img' => 'ray-ban.png',
                'short_desc' => 'Với cảm hứng từ thiết kế...',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Mũ lưỡi trai New Era',
                'long_desc' => 'Mũ lưỡi trai màu xanh đậm có thêu chữ NY của thương hiệu New Era với phong cách tinh nghịch và cá tính, là lựa chọn hoàn hảo cho những dịp dạo phố cùng bạn bè.

- Chất liệu vải polyester pha cotton

- May viền chỉ nổi

- Phía sau khoét cách điệu, phối khóa kim loại để thay đổi độ rộng vòng mũ

- 78% Polyester, 22% Cotton

New Era là thương hiệu thời trang chuyên sản xuất các sản phẩm có liên quan đến thế giới bóng chày. New Era không những cho ra đời các sản phẩm có chất lượng cao mà còn luôn bắt kịp các xu hướng thời trang trong nước và quốc tế. Đây sẽ là sản phẩm tuyệt vời để đồng hành cùng bạn trong bất kỳ dịp đặc biệt nào, không chỉ là phụ kiện tô điểm bên ngoài mà còn giúp bạn thể hiện phong cách thời trang tinh tế của người sử dụng. Hãy khám phá thế giới thời trang ấn tượng và khác biệt của New Era.
',
                'price' => 20,
                'type' => 'hat',
                'img' => 'hat-new-era.png',
                'short_desc' => 'Mũ lưỡi trai màu xanh đậm có thêu chữ NY của thương hiệu New Era với phong cách tinh nghịch và cá tính, là lựa chọn hoàn hảo cho những dịp dạo phố cùng bạn bè. - Chất liệu vải polyester...',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Áo nỉ có mũ Asos',
                'long_desc' => 'Trong mùa thu/đông, chúng ta đều không thể phủ nhận sức hút mãnh liệt của chất liệu len khi mà những chiếc áo len họa tiết với đủ màu sắc vui mắt xuất hiện trên khắp các đường phố, nhưng điều đó không có nghĩa là bạn lại bỏ xó những chiếc áo hoodie quen thuộc của mình. Mặc dù không phải là một xu hướng, áo hoodie cũng giống như những chiếc quần jeans, item này là hình ảnh đại diện cho vẻ năng động, tươi trẻ và luôn trường tồn cùng phong cách hiện đại. Hơn thế nữa, một chiếc áo hoodie ấm áp luôn sẵn sàng để có thể biến bất cứ trang phục nào trong tủ của bạn trở nên trẻ trung hơn gấp bội. Với đặc thù là một item mang nặng tính casual, bạn sẽ không phải mất nhiều thời gian để chuẩn bị cho mình một bộ trang phục hoàn chỉnh với hoodie.
Asos là thương hiệu thời trang bình dân nổi tiếng của Anh được thành lập năm 2000 bởi Nick Robertson dưới hình thức ban đầu là trang web bán hàng thời trang trực tuyến Asos.com dành cho độ tuổi từ 18-34 tuổi. Tuy nhiên, khi càng phát triển, Asos đã thay đổi đối tượng khách hàng khi nhắm đến đa dạng các đối tượng từ phụ nữ, đàn ông, trẻ em cho tới thanh thiếu niên và cung cấp các mặt hàng chủ yếu như giầy dép, phụ kiện, trang sức, quần áo và mỹ phẩm. Phong cách thời trang của Asos chủ yếu được lấy cảm hứng từ những người nổi tiếng để tạo ra những bộ sản phẩm mang tính xu hướng, thời thượng với giá tiêu dùng bình dân nhất.',
                'price' => 40,
                'type' => 'hoodie',
                'img' => 'ao-ni-asos.png',
                'short_desc' => 'Trong mùa thu/đông, chúng ta đều không thể phủ nhận sức hút mãnh liệt của chất liệu len khi mà những chiếc áo len họa tiết với đủ màu sắc vui mắt xuất hiện trên khắp các đường phố, nhưng...',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Áo len cổ lọ Asos',
                'long_desc' => 'Món đồ không thể thiếu trong tủ đồ của nam giới khi mùa đông đến là những chiếc áo len. Những chiếc áo len tuy đơn giản nhưng luôn đem đến sự năng động và hiện đại cho nam giới. Áo cổ lọ (hay còn gọi là cổ cao) mặc khi tiết trời lạnh, giữ ấm cổ. Dáng áo len này phái mạnh có thể mặc trong kèm áo khoác: jacket, blazer, áo choàng...

Len cổ lọ là kiểu áo cơ bản mùa đông, già trẻ gái trai - ai ai cũng "cố thủ" đôi ba chiếc. Mùa đông ở Việt Nam không có tuyết, nhưng sương muối buốt giá cũng đủ thử thách trái tim dũng cảm của mọi người mỗi sáng trở dậy đi học, đi làm. Len cổ lọ, có thể đảm bảo độ ấm áp bằng áo len thường và khăn choàng cộng lại, độ hữu ích chẳng cách nào phủ nhận.
Asos là thương hiệu thời trang bình dân nổi tiếng của Anh được thành lập năm 2000 bởi Nick Robertson dưới hình thức ban đầu là trang web bán hàng thời trang trực tuyến Asos.com dành cho độ tuổi từ 18-34 tuổi. Tuy nhiên, khi càng phát triển, Asos đã thay đổi đối tượng khách hàng khi nhắm đến đa dạng các đối tượng từ phụ nữ, đàn ông, trẻ em cho tới thanh thiếu niên và cung cấp các mặt hàng chủ yếu như giầy dép, phụ kiện, trang sức, quần áo và mỹ phẩm. Phong cách thời trang của Asos chủ yếu được lấy cảm hứng từ những người nổi tiếng để tạo ra những bộ sản phẩm mang tính xu hướng, thời thượng với giá tiêu dùng bình dân nhất.',
                'price' => 30,
                'type' => 'sweater',
                'img' => 'ao-len-asos.png',
                'short_desc' => 'Món đồ không thể thiếu trong tủ đồ của nam giới khi mùa đông đến là những chiếc áo len. Những chiếc áo len tuy đơn giản nhưng luôn đem đến sự năng động và hiện đại cho nam giới....',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Áo khoác có mũ Bellfield',
                'long_desc' => 'Trench coat là một trong những món đồ mà mọi người đều biết chúng rất phù hợp với mùa thu đông cũng như những lúc thời tiết trở lạnh. Tuy là một món thời trang cổ điển, nhưng trench coat dường như có một sức sống mãnh liệt.

Trench coat được mặc bên ngoài bộ suit không làm mất đi tính trang trọng, lịch lãm của set đồ mà còn giúp cho người mặc trông thật tuyệt vời.Với kiểu cổ cao, được thiết kế chi tiết lông thú ở cổ, chiếc trench coat này đem đến vẻ ngoài đậm chất cổ điển, phù hợp với những ai ưa thích phong cách retro.Chiếc áo phao dày dặn bên trong kết hợp cùng trench coat bên ngoài gợi nên hình ảnh một quý ông vô cùng lịch lãm.
Chiếc áo sweater bên trong trench coat tạo nên vẻ ngoài mang một chút năng động, cá tính và thời trang hiện đại. Điểm nhấn của chiếc quần chino đầy trẻ trung kết hợp cùng áo blazer và trench coat thành một set đồ mang đậm vẻ phong trần, mới mẻ cho người mặc. Chiếc quần dạ cũng không phải là ý kiến tồi khi kết hợp với trench coat, vẻ ngoài vừa cổ điển vừa hiện đại của các chàng sẽ được phô diễn một cách tinh tế. Với phụ kiện là một chiếc ô (dù) đen, set đồ mang lại sự nhẹ nhàng của mùa thu, giúp chàng thoải mái cùng các nàng dạo bước trong những chuyến đi chơi đầy thú vị. Kiểu quần jean khi kết hợp với trench coat là một sự phá cách hoàn toàn mới đem lại sự năng động và sức lôi cuốn cho chàng trai.',
                'price' => 50,
                'type' => 'jacket',
                'img' => 'ao-khoac-bellfield.png',
                'short_desc' => 'Trench coat là một trong những món đồ mà mọi người đều biết chúng rất phù hợp với mùa thu đông cũng như những lúc thời tiết trở lạnh. Tuy là một món thời trang cổ điển, nhưng trench coat...',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Áo khoác kéo khóa Asos',
                'long_desc' => 'Những chiếc bomber jacket lại giúp mang tới vẻ gọn gàng và rất man mà không cần phải thêm thắt quá nhiều chi tiết. Chiếc áo khoác đậm chất unisex này khiến có thể hợp với mọi phong cách, và mọi dáng người, khi biết kết hợp đúng đắn. Tuy nhiên nếu bạn là một chàng trai yêu thích sự thời trang và xu hướng thì những chiếc áo bomber jacket hoa, họa tiết lạ mắt sẽ vô cùng phù hợp với phong cách thời trang này. Nhưng đối với những chàng trai yêu sự manh mẽ, nam tính thì những chiếc áo bomber với tông màu basic như đen, xanh, nâu là lựa chọn vô cùng hoàn hảo. Đặc biệt dáng áo này còn giúp các anh chàng tự tin thề hiện cá tính của mình. Bạn cũng có thể kết hợp với với một đôi sneaker và một chiếc mũ snapback để tạo nên phong cách thú vị.
Asos là thương hiệu thời trang bình dân nổi tiếng của Anh được thành lập năm 2000 bởi Nick Robertson dưới hình thức ban đầu là trang web bán hàng thời trang trực tuyến Asos.com dành cho độ tuổi từ 18-34 tuổi. Tuy nhiên, khi càng phát triển, Asos đã thay đổi đối tượng khách hàng khi nhắm đến đa dạng các đối tượng từ phụ nữ, đàn ông, trẻ em cho tới thanh thiếu niên và cung cấp các mặt hàng chủ yếu như giầy dép, phụ kiện, trang sức, quần áo và mỹ phẩm. Phong cách thời trang của Asos chủ yếu được lấy cảm hứng từ những người nổi tiếng để tạo ra những bộ sản phẩm mang tính xu hướng, thời thượng với giá tiêu dùng bình dân nhất.',
                'price' => 55,
                'type' => 'jacket',
                'img' => 'ao-khoac-asos.png',
                'short_desc' => 'Những chiếc bomber jacket lại giúp mang tới vẻ gọn gàng và rất man mà không cần phải thêm thắt quá nhiều chi tiết. Chiếc áo khoác đậm chất unisex này khiến có thể hợp với mọi phong cách, và...',
                'created_at' => now(),
                'updated_at' => now()
            ],
           
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};






?>
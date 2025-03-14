<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand');
            $table->text('long_desc')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('sale_price');
            $table->string('type');
            $table->string('category');
            $table->string('img')->nullable();
            $table->text('short_desc')->nullable();
            $table->timestamps();
        });

        DB::table('products')->insert([
            [
                'name' => 'Áo somi caro Tommy Hilfiger',
                'brand' => 'Tommy Hilfiger',
                'long_desc' => 'Áo sơmi là trang phục lịch sự, trang nhã, luôn đem lại phong cách thanh lịch cho nam giới. Tuy được sử dụng rộng rãi nhưng việc lựa chọn áo sơmi sao cho phù hợp với mỗi người thì không phải là chuyện nhỏ.
',
                'price' => 1500,
                'sale_price' => 0,
                'type' => 'shirt',
                'category' => 'best_selling, new',
                'img' => 'somicaro.png',
                'short_desc' => 'Áo sơmi là trang phục lịch sự, trang nhã, luôn đem lại phong cách thanh lịch cho nam giới. Tuy được sử dụng rộng rãi nhưng việc lựa chọn áo sơmi sao cho phù hợp với mỗi người thì không...',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Quần jean mài Only & Sons',
                'brand' => 'Only & Sons',
                'long_desc' => 'Vẻ năng động mạnh mẽ của nam giới có phần không nhỏ nhờ những chiếc quần jean. Với xu hướng rộng khắp của hàng loạt loại jean như jean rách, jean ống đứng, jean ống côn… phái mạnh sẽ chọn loại quần nào để thêm nam tính?
Các chàng trai cũng đừng quên chọn cho mình những chiếc quần jeans hợp mốt. Đặc biệt ngày nay, quần jeans của nam giới không chỉ có ống đứng dạng to và rộng, chúng đã được “cải tiến” thành những chiếc quần ống nhỏ, ống loe hợp hơn nhưng vẫn tạo sự thoải mái và thể hiện được cá tính mạnh mẽ. Quần jean nam là một item quen thuộc của thời trang nam chúng không hề chỉ là những kiểu dáng đơn giản như mọi người vẫn thường nghĩ. Quần jean nam ngày càng được thiết kế đa dạng hơn với nhiều kiểu dáng để tạo ra nhiều phong cách thời trang cho nam giới. Bạn có thể dễ dàng tìm thấy nhiều kiểu dáng quần jean nam trên thị trường hiện nay như: Jeans ống đứng, Jeans skinny, Jeans ống rộng, jeans có túi hậu, Jeans ống loe, Jean rách, Jeans cạp trễ, Jean mài…
Quần jean nam thường được may từ chất liệu jean mềm dễ chịu và thông thoáng tạo cảm giác thoải mái khi mặc và dễ dàng cho mọi hoạt động. Các chàng có thể phối cùng nhiều kiểu áo thun, áo pull khỏe khoắn hoặc sơ mi thanh lịch, để có một diện mạo hoàn hảo nhất.',
                'price' => 880,
                'sale_price' => 0,
                'type' => 'pants',
                'category' => 'best_selling',
                'img' => 'quanjeanmai.png',
                'short_desc' => 'Vẻ năng động mạnh mẽ của nam giới có phần không nhỏ nhờ những chiếc quần jean. Với xu hướng rộng khắp của hàng loạt loại jean như jean rách, jean ống đứng, jean ống côn… phái mạnh sẽ chọn...',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Kính mắt gọng vuông Ray-Ban',
                'brand' => 'Ray-Ban',
                'long_desc' => 'Với cảm hứng từ thiết kế của dòng kính Wayfarer cổ điển, Ray-Ban giới thiệu một chiếc kính Wayfarer khác với khung kính nhỏ và các đường nét mềm mại hơn. Hoàn hảo với tròng kính polarized chống tia UV, khung kính họa tiết đồi mồi cho một phong cách quyến rũ
- Khung kính nhựa cao cấp dáng vuông họa tiết đồi mồi
- Tròng kính polarized nâu loang màu
- Đệm mũi liền thân kính
- Đầu gọng kính uốn cong đính tên thương hiệu
- Chống tia UV 100%
Kính Ray-Ban chính là một biểu tượng thời trang và khẳng định phong cách sống với lịch sử ra đời từ hơn 70 năm trước. Từ sản phẩm mắt kính Aviator đến kính Wayfarer và nhiều loại kính huyền thoại khác, Ray-Ban đã tạo nên một trào lưu văn hóa lan tỏa mạnh mẽ đến nhiều tầng lớp khác nhau, dù là Hollywood hay trong quân đội Mỹ. Theo đuổi thông điệp “Never hide” - “Không bao giờ che giấu”, Ray-Ban đã và đang là sản phẩm không thể thiếu dành cho những ai yêu thích sự chân thực, muốn thể hiện cái tôi độc lập và khác biệt của mình.',
                'price' => 1640,
                'sale_price' => 1500,
                'type' => 'glasses',
                'category' => 'on_sale, best_selling',
                'img' => 'ray-ban.png',
                'short_desc' => 'Với cảm hứng từ thiết kế...',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Áo nỉ có mũ Asos',
                'brand' => 'Asos',
                'long_desc' => 'Trong mùa thu/đông, chúng ta đều không thể phủ nhận sức hút mãnh liệt của chất liệu len khi mà những chiếc áo len họa tiết với đủ màu sắc vui mắt xuất hiện trên khắp các đường phố, nhưng điều đó không có nghĩa là bạn lại bỏ xó những chiếc áo hoodie quen thuộc của mình. Mặc dù không phải là một xu hướng, áo hoodie cũng giống như những chiếc quần jeans, item này là hình ảnh đại diện cho vẻ năng động, tươi trẻ và luôn trường tồn cùng phong cách hiện đại. Hơn thế nữa, một chiếc áo hoodie ấm áp luôn sẵn sàng để có thể biến bất cứ trang phục nào trong tủ của bạn trở nên trẻ trung hơn gấp bội. Với đặc thù là một item mang nặng tính casual, bạn sẽ không phải mất nhiều thời gian để chuẩn bị cho mình một bộ trang phục hoàn chỉnh với hoodie.
Asos là thương hiệu thời trang bình dân nổi tiếng của Anh được thành lập năm 2000 bởi Nick Robertson dưới hình thức ban đầu là trang web bán hàng thời trang trực tuyến Asos.com dành cho độ tuổi từ 18-34 tuổi. Tuy nhiên, khi càng phát triển, Asos đã thay đổi đối tượng khách hàng khi nhắm đến đa dạng các đối tượng từ phụ nữ, đàn ông, trẻ em cho tới thanh thiếu niên và cung cấp các mặt hàng chủ yếu như giầy dép, phụ kiện, trang sức, quần áo và mỹ phẩm. Phong cách thời trang của Asos chủ yếu được lấy cảm hứng từ những người nổi tiếng để tạo ra những bộ sản phẩm mang tính xu hướng, thời thượng với giá tiêu dùng bình dân nhất.',
                'price' => 360,
                'sale_price' => 0,
                'type' => 'hoodie',
                'category' => 'best_selling, new',
                'img' => 'ao-ni-asos.png',
                'short_desc' => 'Trong mùa thu/đông, chúng ta đều không thể phủ nhận sức hút mãnh liệt của chất liệu len khi mà những chiếc áo len họa tiết với đủ màu sắc vui mắt xuất hiện trên khắp các đường phố, nhưng...',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Áo len cổ lọ Asos',
                'brand' => 'Asos',
                'long_desc' => 'Món đồ không thể thiếu trong tủ đồ của nam giới khi mùa đông đến là những chiếc áo len. Những chiếc áo len tuy đơn giản nhưng luôn đem đến sự năng động và hiện đại cho nam giới. Áo cổ lọ (hay còn gọi là cổ cao) mặc khi tiết trời lạnh, giữ ấm cổ. Dáng áo len này phái mạnh có thể mặc trong kèm áo khoác: jacket, blazer, áo choàng...

Len cổ lọ là kiểu áo cơ bản mùa đông, già trẻ gái trai - ai ai cũng "cố thủ" đôi ba chiếc. Mùa đông ở Việt Nam không có tuyết, nhưng sương muối buốt giá cũng đủ thử thách trái tim dũng cảm của mọi người mỗi sáng trở dậy đi học, đi làm. Len cổ lọ, có thể đảm bảo độ ấm áp bằng áo len thường và khăn choàng cộng lại, độ hữu ích chẳng cách nào phủ nhận.
Asos là thương hiệu thời trang bình dân nổi tiếng của Anh được thành lập năm 2000 bởi Nick Robertson dưới hình thức ban đầu là trang web bán hàng thời trang trực tuyến Asos.com dành cho độ tuổi từ 18-34 tuổi. Tuy nhiên, khi càng phát triển, Asos đã thay đổi đối tượng khách hàng khi nhắm đến đa dạng các đối tượng từ phụ nữ, đàn ông, trẻ em cho tới thanh thiếu niên và cung cấp các mặt hàng chủ yếu như giầy dép, phụ kiện, trang sức, quần áo và mỹ phẩm. Phong cách thời trang của Asos chủ yếu được lấy cảm hứng từ những người nổi tiếng để tạo ra những bộ sản phẩm mang tính xu hướng, thời thượng với giá tiêu dùng bình dân nhất.',
                'price' => 680,
                'sale_price' => 0,
                'type' => 'sweater',
                'category' => 'best_selling, new',
                'img' => 'ao-len-asos.png',
                'short_desc' => 'Món đồ không thể thiếu trong tủ đồ của nam giới khi mùa đông đến là những chiếc áo len. Những chiếc áo len tuy đơn giản nhưng luôn đem đến sự năng động và hiện đại cho nam giới....',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Áo khoác có mũ Bellfield',
                'brand' => 'Bellfield',
                'long_desc' => 'Trench coat là một trong những món đồ mà mọi người đều biết chúng rất phù hợp với mùa thu đông cũng như những lúc thời tiết trở lạnh. Tuy là một món thời trang cổ điển, nhưng trench coat dường như có một sức sống mãnh liệt.

Trench coat được mặc bên ngoài bộ suit không làm mất đi tính trang trọng, lịch lãm của set đồ mà còn giúp cho người mặc trông thật tuyệt vời.Với kiểu cổ cao, được thiết kế chi tiết lông thú ở cổ, chiếc trench coat này đem đến vẻ ngoài đậm chất cổ điển, phù hợp với những ai ưa thích phong cách retro.Chiếc áo phao dày dặn bên trong kết hợp cùng trench coat bên ngoài gợi nên hình ảnh một quý ông vô cùng lịch lãm.
Chiếc áo sweater bên trong trench coat tạo nên vẻ ngoài mang một chút năng động, cá tính và thời trang hiện đại. Điểm nhấn của chiếc quần chino đầy trẻ trung kết hợp cùng áo blazer và trench coat thành một set đồ mang đậm vẻ phong trần, mới mẻ cho người mặc. Chiếc quần dạ cũng không phải là ý kiến tồi khi kết hợp với trench coat, vẻ ngoài vừa cổ điển vừa hiện đại của các chàng sẽ được phô diễn một cách tinh tế. Với phụ kiện là một chiếc ô (dù) đen, set đồ mang lại sự nhẹ nhàng của mùa thu, giúp chàng thoải mái cùng các nàng dạo bước trong những chuyến đi chơi đầy thú vị. Kiểu quần jean khi kết hợp với trench coat là một sự phá cách hoàn toàn mới đem lại sự năng động và sức lôi cuốn cho chàng trai.',
                'price' => 1300,
                'sale_price' => 1000,
                'type' => 'jacket',
                'category' => 'on_sale, best_selling, new',
                'img' => 'ao-khoac-bellfield.png',
                'short_desc' => 'Trench coat là một trong những món đồ mà mọi người đều biết chúng rất phù hợp với mùa thu đông cũng như những lúc thời tiết trở lạnh. Tuy là một món thời trang cổ điển, nhưng trench coat...',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Áo khoác kéo khóa Asos',
                'brand' => 'Asos',
                'long_desc' => 'Những chiếc bomber jacket lại giúp mang tới vẻ gọn gàng và rất man mà không cần phải thêm thắt quá nhiều chi tiết. Chiếc áo khoác đậm chất unisex này khiến có thể hợp với mọi phong cách, và mọi dáng người, khi biết kết hợp đúng đắn. Tuy nhiên nếu bạn là một chàng trai yêu thích sự thời trang và xu hướng thì những chiếc áo bomber jacket hoa, họa tiết lạ mắt sẽ vô cùng phù hợp với phong cách thời trang này. Nhưng đối với những chàng trai yêu sự manh mẽ, nam tính thì những chiếc áo bomber với tông màu basic như đen, xanh, nâu là lựa chọn vô cùng hoàn hảo. Đặc biệt dáng áo này còn giúp các anh chàng tự tin thề hiện cá tính của mình. Bạn cũng có thể kết hợp với với một đôi sneaker và một chiếc mũ snapback để tạo nên phong cách thú vị.
Asos là thương hiệu thời trang bình dân nổi tiếng của Anh được thành lập năm 2000 bởi Nick Robertson dưới hình thức ban đầu là trang web bán hàng thời trang trực tuyến Asos.com dành cho độ tuổi từ 18-34 tuổi. Tuy nhiên, khi càng phát triển, Asos đã thay đổi đối tượng khách hàng khi nhắm đến đa dạng các đối tượng từ phụ nữ, đàn ông, trẻ em cho tới thanh thiếu niên và cung cấp các mặt hàng chủ yếu như giầy dép, phụ kiện, trang sức, quần áo và mỹ phẩm. Phong cách thời trang của Asos chủ yếu được lấy cảm hứng từ những người nổi tiếng để tạo ra những bộ sản phẩm mang tính xu hướng, thời thượng với giá tiêu dùng bình dân nhất.',
                'price' => 1100,
                'sale_price' => 0,
                'type' => 'jacket',
                'category' => 'best_selling, new',
                'img' => 'ao-khoac-asos.png',
                'short_desc' => 'Những chiếc bomber jacket lại giúp mang tới vẻ gọn gàng và rất man mà không cần phải thêm thắt quá nhiều chi tiết. Chiếc áo khoác đậm chất unisex này khiến có thể hợp với mọi phong cách, và...',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // san pham khuyen mai
            [
                'name' => 'Áo sơmi tím Tommy Hilfiger',
                'brand' => 'Tommy Hilfiger',
                'long_desc' => 'Áo sơmi là trang phục lịch sự, trang nhã, luôn đem lại phong cách thanh lịch cho nam giới. Tuy được sử dụng rộng rãi nhưng việc lựa chọn áo sơmi sao cho phù hợp với mỗi người thì không phải là chuyện nhỏ.

Những chiếc áo có màu truyền thống như trắng, đen hay xám rất dễ sử dụng trong nhiều hoàn cảnh khác nhau và dễ dàng kết hợp với các trang phục khác.

Nếu bạn có nhiều sơmi để thay đổi thì có thể mở rộng biên độ về màu sắc. Màu hồng nhạt được nam giới chọn khá nhiều. Tưởng chừng như màu đó chỉ dành cho phái nữ, thực ra sơmi nam màu hồng khi được phái nam diện sẽ tạo được ấn tượng và quan trọng là không hề mất đi vẻ nam tính.

Những chiếc áo kẻ sọc là lựa chọn rất tốt cho vẻ nam tính, mạnh mẽ. Chỉ cần nhớ một nguyên tắc: Những người gầy không nên mặc màu tối hay kẻ sọc to, người mập không nên chọn màu quá lòe loẹt, hoặc kẻ ngang, kẻ carô to.



Thương hiệu Tommy Hilfiger do nhà thiết kế cùng tên sáng lập năm 1985 với các dòng sản phẩm như: quần áo, trang phục thể thao, đồ Jeans, giày, túi xách, nước hoa, đồng hồ và mắt kính phục vụ cho giới trẻ nam nữ.

Các thiết kế của hãng rất đa dạng, từ những mẫu thiết kế cơ bản, cổ điển, đến thanh lịch và năng động.

Với ba màu sắc truyền thống là đỏ, trắng, và xanh dương đậm, Tommy Hilfiger đã trở thành một biểu tượng thương hiệu thời trang của Mỹ',
                'price' => 1700,
                'sale_price' => 1500,
                'type' => 'shirt',
                'category' => 'on_sale, new',
                'img' => 'ao_somi_tim_tommy_hilfiger.jpg',
                'short_desc' => 'Áo sơmi là trang phục lịch sự, trang nhã, luôn đem lại phong cách thanh lịch cho nam giới. ',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Áo nỉ chui đầu Emporio Armani',
                'brand' => 'Emporio Armani',
                'long_desc' => '',
                'price' => 1790,
                'sale_price' => 1500,
                'type' => 'hoodie',
                'category' => 'on_sale, new',
                'img' => 'ao_ni_chui_dau_emporio_armani.jpg',
                'short_desc' => 'Sweatshirt là kiểu áo nỉ chui đầu nhưng không có mũ. Đây cũng được coi là một "biến dạng" độc đáo của áo hoodie đã từng "làm mưa làm gió" và được các tín đồ thời trang ưa chuộng. Điểm đặc biệt của chiếc áo này là có thể kết hợp với nhiều kiểu trang phục khác nhau như quần short, chân váy, áo sơ mi.... tạo nên một phong cách trẻ trung, năng động và tinh nghich cho người mặc.

Mùa thu đông năm nay, thay vì sự xuất hiện của những chiếc áo hoodie (áo nỉ có mũ) như năm ngoái, áo sweatshirt xuất hiện ở mọi nơi, từ sàn catwalk với những thiết kế của các hãng thời trang danh tiếng cho đến những bộ trang phục trên đường phố của các fashionista.



Thương hiệu Emporio Armani được thành lập bởi nhà thiết kế Giorgio Armani, hướng đến các sản phẩm thuộc dòng ready-to-war và phụ kiện. Đặc biệt, các sản phẩm thuộc dòng thương hiệu này đều được làm từ những chất liệu cao cấp. Emporio Armani hướng đến phong cách sportily urban – cá tính thể thao thành thị – với nhưng thiết kế trẻ trung, năng động và mạnh mẽ. Chú trọng sự tối giản và tính ứng dụng cao, các sản phẩm gắn mác Emporio Armani mang đến thiện cảm cho người dùng bởi màu sắc trung tính, kiểu dáng đa dạng và rất dễ mặc',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Áo thun dài tay Fred Perry',
                'brand' => 'Fred Perry',
                'long_desc' => 'Khi tiết trời đang kịp chuyển giao giữa mùa thu và đông thì cũng là lúc nhiều xu hướng mặc ấm được ra đời nhằm đáp ứng nhu cầu của mọi người. Nếu bạn là người bạn rộn, không có thời gian cập nhật xu hướng mới nhưng vẫn muốn trở nên phong cách thì chúng tôi xin giới thiệu cho bạn bộ sưu tập những mẫu áo thun tay dài đơn giản, thời trang, ấm áp mà không bao giờ bị lỗi mốt.

Áo thun tay dài là loại trang phục chiều lòng người mặc nhất, nó không chỉ đơn giản mà rất dễ mix đồ, dù bạn đang ở trong môi trường nào đi nữa, học tập, công sở, dã ngoại, party,… bạn vẫn có thể chọn cho mình những mẫu áo thun tôn dáng và phong cách không kem cạnh gì so với nhiều mẫu thời trang khác.



Nếu bạn đến Anh, chắc chắn bạn không thể không biết thương hiệu street style nổi tiếng Fred Perry. Khỏe khoắn, hiện đại nhưng không kém phần lịch lãm là phong cách chính của Fred Perry.

- Fred Perry: Dòng chính của thương hiệu, tập trung vào phong cách truyền thống, thể thao và có thể dùng khi dạo phố.

- Fred Perry Laurel Wealth: giá thành cũng tương đương Fred Perry nhưng quần áo có xu hướng thời trang hơn thay vì cổ điển như Fred Perry.',
                'price' => 1100,
                'sale_price' => 1000,
                'type' => 'T-shirt',
                'category' => 'on_sale, new',
                'img' => 'ao_thun_dai_tay_fred_perry.jpg',
                'short_desc' => 'Khi tiết trời đang kịp chuyển giao giữa mùa thu và đông thì cũng là lúc nhiều xu hướng mặc ấm được ra đời nhằm đáp ứng nhu cầu của mọi người.',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Mũ lưỡi trai New Era',
                'brand' => 'New Era',
                'long_desc' => 'Mũ lưỡi trai màu xanh đậm có thêu chữ NY của thương hiệu New Era với phong cách tinh nghịch và cá tính, là lựa chọn hoàn hảo cho những dịp dạo phố cùng bạn bè.

- Chất liệu vải polyester pha cotton

- May viền chỉ nổi

- Phía sau khoét cách điệu, phối khóa kim loại để thay đổi độ rộng vòng mũ

- 78% Polyester, 22% Cotton



New Era là thương hiệu thời trang chuyên sản xuất các sản phẩm có liên quan đến thế giới bóng chày. New Era không những cho ra đời các sản phẩm có chất lượng cao mà còn luôn bắt kịp các xu hướng thời trang trong nước và quốc tế. Đây sẽ là sản phẩm tuyệt vời để đồng hành cùng bạn trong bất kỳ dịp đặc biệt nào, không chỉ là phụ kiện tô điểm bên ngoài mà còn giúp bạn thể hiện phong cách thời trang tinh tế của người sử dụng. Hãy khám phá thế giới thời trang ấn tượng và khác biệt của New Era.',
                'price' => 240,
                'sale_price' => 200,
                'type' => 'cap',
                'category' => 'on_sale',
                'img' => 'mu_luoi_trai_new_era.jpg',
                'short_desc' => 'Mũ lưỡi trai màu xanh đậm có thêu chữ NY của thương hiệu New Era với phong cách tinh nghịch và cá tính, là lựa chọn hoàn hảo cho những dịp dạo phố cùng bạn bè.',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Mũ len đính cục bông Asos',
                'brand' => 'Asos',
                'long_desc' => 'Ngoài tất, khăn quàng và găng tay thì những chiếc mũ len đội đầu chính là món đồ được săn đón nhiều nhất bởi sự đa dạng về kiểu dáng, màu sắc cũng như phong cách mà nó mang lại cho người dùng.

Nổi lên trong số đó là loại mũ len móc, dáng tròn, hơi thả lỏng một chút về phía sau đầu. Kiểu mũ phổ biến này mà hầu như ai cũng sở hữu một chiếc trong tủ đồ được gọi là mũ beanie. Chúng thường được làm bằng các chất liệu như dệt kim, len mỏng, len xoắn... với rất nhiều màu sắc tự nhiên, vì vậy sẽ vô cùng thuận tiện cho việc mix đồ và phù hợp với tất cả mọi người.



Asos là thương hiệu thời trang bình dân nổi tiếng của Anh được thành lập năm 2000 bởi Nick Robertson dưới hình thức ban đầu là trang web bán hàng thời trang trực tuyến Asos.com dành cho độ tuổi từ 18-34 tuổi. Tuy nhiên, khi càng phát triển, Asos đã thay đổi đối tượng khách hàng khi nhắm đến đa dạng các đối tượng từ phụ nữ, đàn ông, trẻ em cho tới thanh thiếu niên và cung cấp các mặt hàng chủ yếu như giầy dép, phụ kiện, trang sức, quần áo và mỹ phẩm. Phong cách thời trang của Asos chủ yếu được lấy cảm hứng từ những người nổi tiếng để tạo ra những bộ sản phẩm mang tính xu hướng, thời thượng với giá tiêu dùng bình dân nhất.',
                'price' => 240,
                'sale_price' => 200,
                'type' => 'beanie',
                'category' => 'on_sale',
                'img' => 'mu_len_dinh_cuc_bong_asos.jpg',
                'short_desc' => 'Ngoài tất, khăn quàng và găng tay thì những chiếc mũ len đội đầu chính là món đồ được săn đón nhiều nhất bởi sự đa dạng về kiểu dáng, màu sắc cũng như phong cách mà nó mang lại',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Mũ cói dây viền đen Brixton',
                'brand' => 'Brixton',
                'long_desc' => 'Mũ cói là món phụ kiện thời trang không bao giờ hết mốt. Chỉ cần khéo léo một chút, nó sẽ khiến cho bộ trang phục của bạn phong cách hơn hẳn.

Một loại mũ cói cực thời trang nữa là mũ panama cổ điển (classic panama hat), rất dễ kết hợp đồ, đặc biệt là những bộ trang phục mang phong cách đường phố, và là một trong vài dòng mũ cói có thể dùng cho cả nam và nữ.

Bạn đừng nghĩ mũ cói phải theo một màu sắc cơ bản nào đó, bạn hoàn toàn có thể chọn cho mình những chiếc mũ cói với màu sắc hoặc họa tiết nổi bật.



Brixton là một thương hiệu đến từ Anh quốc, đây cũng là thương hiệu yêu thích của chàng ca sĩ nổi tiếng Justin Bieber. Với một loạt cảm hứng được chuyển thể từ âm nhạc, văn hóa và nghệ thuật - nhãn hàng California đã nhanh chóng trở thành một trong những cái tên được tìm đến nhiều nhất trong mắt các fashionista quốc tế. Từ beanie, snapback cho đến fedora hay trilby, các sản phẩm của Brixton đều xứng đáng đạt khung điểm từ 8 đến 10 và chắc chắn - đây sẽ là những sản phẩm phù hợp nhất để bạn diện đến các lễ hội mùa thu đang chuẩn bị diễn ra.',
                'price' => 900,
                'sale_price' => 800,
                'type' => 'straw_hat',
                'category' => 'on_sale',
                'img' => 'mu_coi_day_vien_den_brixton.jpg',
                'short_desc' => 'Mũ cói là món phụ kiện thời trang không bao giờ hết mốt. Chỉ cần khéo léo một chút, nó sẽ khiến cho bộ trang phục của bạn phong cách hơn hẳn.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // san pham noi bat
            [
                'name' => 'Cà vạt lụa Calvin Klein',
                'brand' => 'Calvin Klein',
                'long_desc' => 'Caravat đẹp, chất lượng tốt của Calvin Klein:

- Kiểu cách, mẫu mã nhiều, đa dạng

- Kích thước dây đeo thoải mái

- Phù hợp phối với nhiều mẫu áo sơ mi, công sở…

Màu sắc: Xám

Hướng dẫn sử dụng:

- Làm sạch nhẹ nhành, nên giặt bằng taykhăn ẩm

- Không nên dùng bột giặt có chất tẩy mạnh



Không chỉ nổi tiếng với những thiết kế thời trang xóa nhòa ranh giới tuổi tác và giới tính thông qua phong cách unisex, Calvin Klein còn gây ấn tượng bởi các sản phẩm phụ kiện phản ánh lối sống hiện đại, trẻ trung, phóng khoáng. Các sản phẩm của Calvin Klein luôn trung thành với nguyên tắc “Simply as possible, Success as possible”. Từ mẫu mã đến chất liệu, từ trang phục đến phụ kiện, tất cả đều đơn giản, thuần nhất, không cầu kỳ về chi tiết, không rực rỡ về màu sắc. Chính sự đơn giản đó mang lại vẻ đẹp phù hợp với tất cả mọi người cũng như có tính ứng dụng cực cao, đúng như cách mà giới thời trang vẫn nói: Simple is the best.',
                'price' => 900,
                'sale_price' => 0,
                'type' => 'tie',
                'category' => 'best_selling',
                'img' => 'ca_vat_lua_calvin_klein.jpg',
                'short_desc' => 'Caravat đẹp, chất lượng tốt của Calvin Klein: - Kiểu cách, mẫu mã nhiều, đa dạng - Kích thước dây đeo thoải mái - Phù hợp phối với nhiều mẫu áo sơ mi, công sở… Màu sắc: Xám',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Khăn cài túi áo vest Asos',
                'brand' => 'Asos',
                'long_desc' => 'Cũng giống như thanh kẹp cà vạt thì pocket square (một loại khăn để tay gấp để trong túi áo vest) cũng là chi tiết giúp tô điểm cho phong cách lịch lãm của một quý ông khi mặc áo vest. Thông thường, pocket square được sử dụng trong những không gian sang trọng như tiệc tùng hoặc đám cưới và việc gấp một chiếc khăn vuông trang trí cho chiếc túi áo ngực là cả một nghệ thuật, không chỉ thể hiện đẳng cấp mà còn sự tinh tế của một quý ông. Pocket square sẽ mang đến nét linh hoạt cho chiếc áo vest, đồng thời tạo một hình ảnh vui tươi, thú vị hơn cho phong cách vốn cứng nhắc của chiếc áo vest.



Asos là thương hiệu thời trang bình dân nổi tiếng của Anh được thành lập năm 2000 bởi Nick Robertson dưới hình thức ban đầu là trang web bán hàng thời trang trực tuyến Asos.com dành cho độ tuổi từ 18-34 tuổi. Tuy nhiên, khi càng phát triển, Asos đã thay đổi đối tượng khách hàng khi nhắm đến đa dạng các đối tượng từ phụ nữ, đàn ông, trẻ em cho tới thanh thiếu niên và cung cấp các mặt hàng chủ yếu như giầy dép, phụ kiện, trang sức, quần áo và mỹ phẩm. Phong cách thời trang của Asos chủ yếu được lấy cảm hứng từ những người nổi tiếng để tạo ra những bộ sản phẩm mang tính xu hướng, thời thượng với giá tiêu dùng bình dân nhất.',
                'price' => 160,
                'sale_price' => 0,
                'type' => 'pocket_square',
                'category' => 'best_selling',
                'img' => 'khan_cai_tui_ao_vest_asos.jpg',
                'short_desc' => 'Cũng giống như thanh kẹp cà vạt thì pocket square (một loại khăn để tay gấp để trong túi áo vest) cũng là chi tiết giúp tô điểm cho phong cách lịch lãm của một quý ông khi mặc áo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Khăn ống Tommy Hilfiger',
                'brand' => 'Tommy Hilfiger',
                'long_desc' => 'Mọi người luôn cho rằng khăn ống là phụ kiện dành riêng cho nữ giới, nhưng hiện nay nam giới cũng có thể diện được những chiếc khăn ống cá tính và đầy ấm áp này. Bạn đừng vội từ chối vì cho rằng chiếc khăn này sẽ làm giảm độ "manly" của mình, trái lại khăn ống còn giúp bạn tạo phong cách cá tính và nổi bật hơn cho mình đấy.

Khăn ống dành cho nam giới cũng có khá nhiều màu sắc và họa tiết để bạn kết hợp với các loại trang phục khác nhau. Một chiếc khăn họa tiết hay màu sắc rực rỡ như đỏ, vàng, xanh... giúp làm cho những bộ trang phục màu tối của bạn thu hút và trẻ trung hơn hẳn.



Thương hiệu Tommy Hilfiger do nhà thiết kế cùng tên sáng lập năm 1985 với các dòng sản phẩm như: quần áo, trang phục thể thao, đồ Jeans, giày, túi xách, nước hoa, đồng hồ và mắt kính phục vụ cho giới trẻ nam nữ.

Các thiết kế của hãng rất đa dạng, từ những mẫu thiết kế cơ bản, cổ điển, đến thanh lịch và năng động.

Với ba màu sắc truyền thống là đỏ, trắng, và xanh dương đậm, Tommy Hilfiger đã trở thành một biểu tượng thương hiệu thời trang của Mỹ.',
                'price' => 800,
                'sale_price' => 700,
                'type' => 'scarf',
                'category' => 'on_sale, best_selling',
                'img' => 'khan_ong_tommy_hilfiger.jpg',
                'short_desc' => 'Mọi người luôn cho rằng khăn ống là phụ kiện dành riêng cho nữ giới, nhưng hiện nay nam giới cũng có thể diện được những chiếc khăn ống cá tính và đầy ấm áp này.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Khăn lụa bản nhỏ Ted Baker',
                'brand' => 'Ted Baker',
                'long_desc' => 'Ấn tượng đầu tiên một chiếc khăn lụa mang đến chắc chắn là sự sang trọng, tinh tế và cao cấp. Chúng có giá trị nhiều về mặt trang sức, rất phù hợp cho các quý ông diện kèm theo suit và tuxedo trong những bữa tiệc sang trọng.

Kiểu quàng cơ bản là cách dễ nhất để bạn sử dụng khăn, tất cả những gì bạn cần làm là đưa khăn qua cổ áo và chỉnh cho các nếp khăn ngay ngắn và gọn gàng. Phong cách trên thường được sử dụng với blazer hoặc áo suit, vị trí đặt khăn sẽ là giữa lớp áo sơ mi và áo suit.



Sau khi được phát triển thành thương hiệu có tiếng chuyên về áo sơ mi nam ở Glasgow, Anh, Ted Baker nhanh chóng trở thành nơi để những người đàn ông đương đại tìm kiếm những chiếc áo phù hợp.

Từ những ngày đầu, Ted Baker rất rõ ràng, kiên định, tập trung vào chất lượng, chú ý đến chi tiết với sự hài hước kỳ quặc. Cửa hàng đầu tiên của Ted Baker còn cung cấp dịch vụ giặt ủi cho mỗi chiếc áo được mua. Thương hiệu đã nhanh chóng đạt được thành công với danh hiệu “No Ordinary Designer Label” (thương hiệu của nhà thiết kế không tầm thường). Tất cả mọi thứ được sản xuất dưới tên Ted Baker đều cấu thành với sự độc đáo và tình yêu từ trong trái tim.',
                'price' => 980,
                'sale_price' => 0,
                'type' => 'scarf',
                'category' => 'best_selling',
                'img' => 'khan_lua_ban_nho_ted_baker.jpg',
                'short_desc' => 'Ấn tượng đầu tiên một chiếc khăn lụa mang đến chắc chắn là sự sang trọng, tinh tế và cao cấp. Chúng có giá trị nhiều về mặt trang sức, rất phù hợp cho các quý ông',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // san pham moi
            [
                'name' => 'Áo khoác dạ Selected Homme',
                'brand' => 'Selected Homme',
                'long_desc' => 'Áo khoác dạ nam cũng được phái mạnh lựa chọn nhiều trong những trang phục hàng ngày tới công sở bởi nét thanh lịch và cũng rất phong cách mà dáng áo này mang lại.

Áo khoác dạ là món đồ khá quen thuộc không chỉ với phái đẹp mà các nam công sở cũng rất ưu ái cho loại áo khoác này mỗi độ đông về, đặc biệt là các nam công sở trẻ sẽ đa dạng về mẫu mã và màu sắc hơn nam trung niên. Các bạn có thể diện áo khoác dạ cùng những mẫu áo len body mặc trong vừa ấm áp vừa rất thời trang nhé.



Tuy không đa dạng về màu sắc như áo khoác dạ của phái đẹp, áo khoác dạ nam chỉ đơn giản với những gam màu trầm như đen, ghi, đỏ đô hay be nhưng lại rất dễ mix đồ và phù hợp với nhiều màu da, vóc dáng người mặc.

Áo khoác dạ nam được thiết kế cơ bản với kiểu dáng áo mangto và áo vest dạ, mangto dạ bạn cũng có thể chọn cho mình dáng dài trùm gối hay dáng ngắn trùm hông. Với môi trường công sở, các bạn cũng chỉ cần chọn cho mình những mẫu áo trùm hông gọn gàng, đơn giản cũng vừa đủ ấm áp cho ngày đông rồi nhé.',
                'price' => 2500,
                'sale_price' => 0,
                'type' => 'jacket',
                'category' => 'new',
                'img' => 'ao_khoac_da_selected_homme.jpg',
                'short_desc' => 'Áo khoác dạ nam cũng được phái mạnh lựa chọn nhiều trong những trang phục hàng ngày tới công sở bởi nét thanh lịch và cũng rất phong cách mà dáng áo này mang lại.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Giày da lộn New Look',
                'brand' => 'New Look',
                'long_desc' => 'Giày casual thời trang nam từ thương hiệu New Look mang kiểu dáng mạnh mẽ và sành điệu, cho các bạn nam tự tin tham gia mọi sự kiện. Kiểu dáng thắt dây làm bật lên cá tính và phong cách.

- Size: Giày có kích cỡ đúng tiêu chuẩn

- Chất liệu: Da lộn

- Kiểu mũi giày: Mũi tròn

- Kiểu giày: Giày dây cột



Bạn muốn khoác lên mình một diện mạo mới? Hãy đến với New Look, vì đó là sứ mệnh cũng như phương châm của thương hiệu thời trang được thành lập vào năm 1969, tại Taunton, Vương Quốc Anh. Trải qua quá trình hình thành và phát triển, cho đến ngày nay New Look được biết đến là chuỗi bán lẻ thời trang nhanh, cập nhật liên tục phong cách thời trang trẻ trên toàn thế giới, đặc biệt là phong cách thời trang đường phố (thời trang casual). Với 1.100 cửa hàng ở khắp 120 nước trên thế giới, New Look sẽ mang đến cho bạn những xu hướng mới nhất từ sàn catwalk, từ những bộ trang phục theo mùa cho đến những item đang hot. New Look muốn mang đến cho bạn cảm giác tươi mới và thoải mái như chính bộ trang phục mà bạn đang mặc. New Look UK có đội ngũ thiết kế trẻ, đam mê thời trang và luôn cập nhật nhanh nhất những xu hướng thời trang đường phố mới nhất hay tâm điểm trên sàn catwalk. Những thiết kế của New Look là kết hợp hoàn hảo của sự nữ tính, độc lập, mạnh mẽ và luôn dịch chuyển.',
                'price' => 499,
                'sale_price' => 0,
                'type' => 'shoes',
                'category' => 'new',
                'img' => 'giay_da_lon_new_look.jpg',
                'short_desc' => 'Giày casual thời trang nam từ thương hiệu New Look mang kiểu dáng mạnh mẽ và sành điệu, cho các bạn nam tự tin tham gia mọi sự kiện. Kiểu dáng thắt dây làm bật lên cá tính',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Giày da mờ buộc dây Aldo',
                'brand' => 'Aldo',
                'long_desc' => 'Sản phẩm thời trang cao cấp, có form dáng chuẩn, da mềm cho mang lại cảm giác thoáng mát, thoải mái, nâng niu đôi chân bạn.

Chất liệu: Da mờ cao cấp

Đế làm bằng cao su, ma sát tốt, không nứt vỡ, ít bị mài mòn

Sản phẩm được bảo hành 01 năm về da và đế

Hàng hiệu Aldo – cái tên đồng nghĩa với lớp học và phong cách. Giầy, thắt lưng, bốt và túi xách là hình ảnh thu nhỏ của phong cách vượt thời gian. Aldo cung cấp các thiết kế hợp thời với giá cả phải chăng và là thương hiệu điểm đến cho sự thoải mái và phong cách ở khắp mọi nơi. Aldo là một trong hầu hết nhãn hiệu giầy dép thời trang được quốc tế công nhận.



Aldo cung cấp các xu hướng mới và cả theo phong cách cổ điển. Giày – thắt lưng – túi xách Aldo được thiết kế để thu hút những người sành thời trang và nắm bắt kịp xu hướng ở đa quốc gia. Tầm nhìn của Aldo với mục đích tạo ra một thế giới tốt đẹp hơn bằng việc đóng góp từ thiện nhiều. Aldo cam kết cập nhật những xu hướng mới nhất song song với nhu cầu hàng ngày. Hãy bổ sung thắt lưng – giày – túi xách Aldo vào bộ sưu tập của bạn để nói lên phong cách riêng của mình. Sản phẩm của Aldo luôn luôn hiện đại với những phong cách tươi mới.',
                'price' => 1900,
                'sale_price' => 0,
                'type' => 'shoes',
                'category' => 'new',
                'img' => 'giay_da_mo_buoc_day_aldo.jpg',
                'short_desc' => 'Sản phẩm thời trang cao cấp, có form dáng chuẩn, da mềm cho mang lại cảm giác thoáng mát, thoải mái, nâng niu đôi chân bạn. Chất liệu: Da mờ cao cấp Đế làm bằng cao su, ma sát tốt',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Giày thể thao da lộn Ellesse',
                'brand' => 'Ellesse',
                'long_desc' => 'Ellesse luôn mang đến cho Bạn các sản phẩm tinh tế, chất lượng, hiện đại về kiểu dáng, thời trang mới nhất, mang đến sự tự tin và năng động cho bạn trong sinh hoạt hằng ngày. Đến với Ellesse, bạn sẽ có nhiều sự lựa chọn phong phú, hoàn hảo và hợp thời trang nhất.

- Chất liệu da lộn thông thoáng

- Đế cao su rắn chắc, êm ái

- Thiết kế đơn giản độ bền vượt trội



Hướng dẫn sử dụng:

- Bảo quản trong điều kiện môi trường khô thoáng

- Sản phẩm có thể chải giặt với môi trường nước thường

- Tránh phơi sản phẩm trực tiếp dưới ánh nắng mặt trời

- Tránh để sản phẩm tiếp xúc với vật nhọn',
                'price' => 1200,
                'sale_price' => 0,
                'type' => 'shoes',
                'category' => 'new',
                'img' => 'giay_the_thao_da_lon_ellesse.jpg',
                'short_desc' => 'Ellesse luôn mang đến cho Bạn các sản phẩm tinh tế, chất lượng, hiện đại về kiểu dáng, thời trang mới nhất, mang đến sự tự tin và năng động cho bạn trong sinh hoạt hằng ngày.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('products');
    }
};

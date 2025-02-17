<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tạo bảng 'news'
        Schema::create('news', function (Blueprint $table) {
            $table->id(); // ID tự tăng
            $table->string('title'); // Tiêu đề bài viết
            $table->string('slug')->unique(); // Slug duy nhất (URL friendly)
            $table->text('content'); // Nội dung bài viết
            $table->text('detail'); // Nội dung bài viết chi tiet
            $table->string('image')->nullable(); // Ảnh bài viết (có thể null)
            $table->timestamp('published_at')->nullable(); // Ngày xuất bản (có thể null)
            $table->timestamps(); // created_at & updated_at
        });

        // Chèn dữ liệu mẫu vào bảng 'news'
        DB::table('news')->insert([
            [
                'title' => 'Màu sắc lòe loẹt dành cho phái mạnh',
                'slug' => 'mau-sac-loe-loet-danh-cho-phai-manh',
                'content' => 'Màu sắc tạo nên thời trang và phong cách. Việc các chàng sử dụng màu sắc như thế nào để trở nên nam tính hơn thì nó lại hoàn toàn phụ thuộc vào gu thẩm mỹ và cái nhìn tinh tế về thời trang trong bản thân mỗi người. Vì...',
                'detail'=> '
<p>
    Màu sắc tạo nên thời trang và phong cách. Việc các chàng sử dụng màu sắc như thế nào để trở nên nam tính hơn thì hoàn toàn phụ thuộc vào gu thẩm mỹ và cái nhìn tinh tế về thời trang của mỗi người. 
    Vì vậy, đừng đổ lỗi rằng những sắc màu rực rỡ làm mất đi vẻ nam tính. Hãy cùng thử sức khám phá sức mạnh của những gam màu cơ bản đáng yêu, vốn là đại diện tiêu biểu của mùa hè.
</p>

<h3>Màu xanh dương</h3>
<p>
    Màu xanh dương, đặc biệt là xanh dương đậm, là màu sắc mạnh và sống động, rất dễ phối hợp quần áo. Nhà thiết kế của Calvin Klein, Zucchelli nhấn mạnh 
    <strong>"Sắc xanh là một trong những màu dễ mặc nhất của đàn ông, loại màu mà họ có thể mặc và rất có thể muốn mặc"</strong>. 
    Gam màu này phù hợp với tất cả màu da, màu tóc và cả hai phái đều có thể diện đẹp với nó. Màu sắc an toàn nhất khi sánh đôi với xanh dương đậm là <em>trắng, be sáng và xám nhạt</em>. Nhưng nếu bạn muốn tạo sự đột phá, hãy kết hợp với trang phục mang họa tiết xanh dương.
</p>
<p>
    Dù có rực rỡ đến đâu, màu xanh dương cũng không bao giờ làm mất đi vẻ nam tính của người mặc. Nó "an toàn" nhưng không nhàm chán hay lỗi mốt.
</p>

<h3>Màu đỏ</h3>
<p>
    Một chút sắc đỏ được đặt cạnh những tông màu trung tính cũng đủ để khiến trang phục thường ngày của nam giới trở nên vui tươi, mang nhiều không khí mùa hè hơn. 
    Màu đỏ cũng được đánh giá là có khả năng hấp dẫn phái đẹp bậc nhất. Vì vậy, cũng đáng để các chàng trai liều lĩnh với màu đỏ phải không nào?
</p>
<p>
    Cách đơn giản nhất để diện màu đỏ vẫn là một chiếc <strong>áo phông</strong> hoặc một bộ <strong>suite</strong>. Nếu muốn dễ nhìn hơn, thử nghiệm một chiếc <strong>quần chinos đỏ</strong> là một gợi ý không tồi. 
    Và chắc chắn rằng, bạn sẽ phải nhờ đến các sắc trung tính để làm dịu bớt sự nổi bật của sắc màu rực rỡ này.
</p>

<h3>Màu vàng</h3>
<p>
    Đừng nghĩ rằng chỉ có những người đàn ông can đảm mới dám khoác lên mình trang phục vàng chói. Hãy nhìn những hình ảnh street style dưới đây để thấy rằng 
    không phải chỉ có màu đen mới làm cho cánh mày râu trở nên lịch lãm!
</p>
<p>
    Mùa hè 2014 đánh dấu sự trở lại ngoạn mục của các sắc màu nổi bật, làm sống lại trào lưu màu neon "điên rồ" của những năm 1980. 
    Và giờ đây, sắc màu sặc sỡ ấy đang tấn công vào các đường runway dành riêng cho quý ông. Nếu bạn không thích quá nổi bật, hãy chọn trang phục có một số điểm nhấn <strong>màu vàng</strong> nhất định. Một vài chi tiết nhỏ cũng đủ thu hút mọi ánh nhìn.
</p>

<h3>Màu xanh lá cây</h3>
<p>
    Đây là một sự lựa chọn hiếm thấy nhất, đồng nghĩa với sự nổi bật không gì sánh bằng. Màu xanh lá cây tươi mát, rực rỡ nhưng luôn tạo nên thiện cảm trong mắt người đối diện, 
    khác hẳn với sắc đỏ hay vàng. Cũng theo công thức tương tự: <strong>blazer, suit, quần shorts hay áo phông</strong>... tất cả những gì mang sắc xanh lá cây đều nổi bật một cách tự nhiên và cuốn hút.
</p>
',
                'image' => 'news_imagesevent_2025.jpg',
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sơmi denim cho chàng khoe cá tính',
                'slug' => 'somi-denin-cho-chang-khoe-ca-tinh',
                'content' => 'Denim được coi là chất vải dành cho người lao động và biểu hiện của sự phá cách, bền bỉ, mạnh mẽ. Bản chất cứng cáp, thô mộc dẫn lối denim đến với sản phẩm may mặc dành cho nam giới, trước khi "tán tỉnh" và chinh phục dòng sản...',
                'detail' => '
<p>
    Denim được coi là chất vải dành cho người lao động và biểu hiện của sự phá cách, bền bỉ, mạnh mẽ. 
    Bản chất cứng cáp, thô mộc dẫn lối denim đến với sản phẩm may mặc dành cho nam giới, trước khi "tán tỉnh" và chinh phục dòng sản phẩm dành cho nữ giới.
</p>

<h5>Sự phát triển của denim qua thời gian</h5>
<p>
    Cách đây vài thập kỷ, khi denim còn hạn chế về chất liệu, nam giới chủ yếu chuộng những chiếc <strong>quần jeans dáng thụng</strong>, 
    giúp họ thoải mái hoạt động mà không lo dễ sờn rách. Sau đó, sự xuất hiện của các dòng <strong>denim mềm nhẹ, denim co giãn, denim xước</strong>... 
    với nhiều sắc độ xanh khác nhau tạo cơ hội phát triển cho áo sơ-mi nam. Các chàng có thể thỏa sức biến tấu denim theo cách riêng để khoe cá tính.
</p>


<p>
    Diện <strong>sơ-mi denim</strong>, chàng trai "nữ tính" nhất cũng trở nên khỏe khoắn, năng động và đàn ông hơn. 
    Sơ-mi denim không kén người mặc, cũng không hạn chế về lứa tuổi, nhưng phải thừa nhận rằng nam giới diện kiểu áo này đẹp nhất khi vóc dáng hoàn toàn trưởng thành.
</p>


<p>
    Kiểu dáng dành cho <strong>sơ-mi denim nam</strong> hiện nay thiên về phom ôm sát cơ thể, giúp tôn lên body. 
    Thiết kế thường có <strong>cổ áo bẻ, túi ngực và phần thân lượn eo</strong>. Tuy nhiên, áo vẫn giữ được nét cứng cáp nhờ đường gân áo, đường viền gấu may bằng chỉ bò.
</p>


<p>
    Sơ-mi denim có thể <strong>mix theo nhiều phong cách khác nhau</strong>, tùy vào sở thích và cá tính người mặc:
</p>
<ul>
    <li><strong>Phong cách Hàn Quốc:</strong> Sơ-mi denim xanh lơ chất mỏng nhẹ, không túi, kết hợp cùng quần jeans rách và giày lười.</li>
    <li><strong>Phong cách đơn giản, tiện lợi:</strong> Sơ-mi denim xanh sậm có túi ngực, phần vai áo được trần chỉ nổi, kết hợp cùng quần jeans thụng và giày thể thao (hoặc quần kaki thụng tối màu và giày da nâu).</li>
</ul>


<p>
    Ngoài những chiếc áo cơ bản như <strong>sơ-mi trắng, sơ-mi xanh, sơ-mi đen</strong>, trong tủ đồ của quý ông cũng nên "thủ" ít nhất một chiếc sơ-mi denim. 
    Khi kết hợp với quần kaki và giày da lộn vào mùa nóng, hay diện bên trong áo vest vào mùa lạnh, sơ-mi denim đều mang đến vẻ lịch lãm và mạnh mẽ.
</p>
',
                'image' => 'news_imagesai_future.jpg',
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Quý ông: mặc gì để "trẻ mãi không già"?',
                'slug' => 'quy-ong-mac-gi-de-tr-mai-khong-gia',
                'content' => 'Kiểu y phục hợp với mọi lứa tuổi, từ chàng thanh niên cho tới quý ông chạm ngưỡng 60. Phong cách trẻ mãi không già là gì? Y phục nam giới đang ngày càng chuyển hướng tới phong cách trẻ mãi không già -  phù hợp với  đàn ông ở mọi lứa...',
                'detail' => '<h5>Phong cách trẻ mãi không già – Y phục phù hợp với mọi lứa tuổi</h5>
<p>
    Y phục nam giới ngày càng chuyển hướng tới phong cách <strong>trẻ mãi không già</strong>, phù hợp với đàn ông ở mọi lứa tuổi, 
    từ chàng thanh niên cho tới quý ông về hưu. Điều này không có nghĩa là tất cả họ mặc "đồng phục" giống nhau, 
    mà chỉ đơn giản là những trang phục có tính linh hoạt, vượt qua khoảng cách thế hệ.
</p>

<h5>Thế nào là phong cách trẻ mãi không già?</h5>
<p>
    Hãy thử tưởng tượng một anh chàng diện bộ cánh đáng lẽ dành cho cha mình. Ban đầu, anh ta nghĩ rằng bộ đồ này 
    có vẻ cứng nhắc và nghiêm túc, nhưng khi nhìn vào gương, anh lại bất ngờ và thích thú với vẻ nam tính, 
    chững chạc của bản thân. Đó chính là sức mạnh của phong cách vượt thời gian.
</p>
<p>
    Tuy nhiên, nếu bộ vest đó được cắt may tinh tế, có sọc kẻ trên nền vải, kết hợp với sơ-mi trắng và cà vạt đen nhỏ nhắn, 
    thì tổng thể trang phục sẽ mang đến một ấn tượng hoàn toàn khác – hiện đại hơn nhưng vẫn giữ được vẻ lịch lãm. 
    Điều quan trọng là phong cách tổng thể vẫn được duy trì, ngay cả khi có những điều chỉnh nhỏ trong từng chi tiết.
</p>

<h5>Phong cách trẻ mãi không già trong đời sống hàng ngày</h5>
<p>
    Tôi từng chụp một bức ảnh ghi lại trang phục của một <strong>sĩ quan kỵ binh đã nghỉ hưu</strong> tại Somerset House trong tuần lễ thời trang London. 
    Ông mặc một chiếc <strong>áo khoác cổ nhung</strong>, kết hợp sơ-mi sọc và cà vạt lụa đỏ. Ở giữa hai lớp áo chính, ông mặc một chiếc <strong>ghi-lê bông màu xanh lá cây</strong>. 
    Dù những item này khá đơn giản, nhưng khi kết hợp lại, chúng tạo nên một phong cách vô cùng cuốn hút.
</p>
<p>
    Dù ở <strong>Milan, Paris hay London</strong>, người đàn ông này vẫn trung thành với phong cách yêu thích của mình suốt nhiều thập kỷ. 
    Thậm chí, ông còn từng kết hợp <strong>áo khoác quân đội</strong> với sơ-mi trắng lịch lãm, mang đến sự pha trộn giữa nét cổ điển, khỏe khoắn và nam tính.
</p>

<h5>Phong cách trẻ mãi không già trên sàn diễn thời trang</h5>
<p>
    Khi tham dự <strong>tuần lễ thời trang London</strong> dành cho nam giới, không khó để nhận ra rằng vest ngày càng được các nhà mốt chú trọng phát triển. 
    Đa phần trong số đó là những thiết kế đơn giản, lịch lãm, có thể ứng dụng cho quý ông từ <strong>30 đến 60 tuổi</strong>.
</p>
<p>
    Tôi đặc biệt ấn tượng với bộ sưu tập của <strong>Richard James</strong> với các thiết kế bằng <strong>vải tuýt</strong> tuyệt đẹp, 
    hàng dệt kim truyền thống, chinos màu sắc và giày <strong>Brogues cổ điển</strong>. Ngoài ra, thiết kế của <strong>Savile Row</strong> cũng rất đáng chú ý, 
    bởi chúng không chỉ thu hút các chàng trai mà còn có thể làm hài lòng cả... cha của họ!
</p>

<h5>Phong cách trang phục nam cổ điển</h5>
<p>
    Tôi đã sử dụng từ "<strong>cổ điển</strong>" nhiều lần, vì đó là yếu tố giúp quý ông duy trì vẻ "<strong>trẻ mãi không già</strong>". 
    Ngay cả những người không quá quan tâm đến quần áo, nếu họ ăn mặc bảnh bao và lịch lãm, thì phong cách của họ vẫn vượt qua thử thách của thời gian.
</p>

<h5>Thời trang và phong cách – Giống nhau không?</h5>
<p>
    <strong>Không.</strong> Quý ông không cần phải liên tục mua quần áo mới hay chạy theo xu hướng để duy trì vẻ bảnh bao, quyến rũ. 
    <strong>Thời trang</strong> không giống như <strong>phong cách</strong>. Nếu bạn có phong cách, ngay cả khi mặc đồ cũ, bạn vẫn có thể trông hấp dẫn. 
    Nhưng nếu bạn chỉ đơn thuần là một người thích mua sắm hàng hiệu, điều đó không đồng nghĩa với việc bạn sẽ tạo được ấn tượng mạnh mẽ trong mắt người khác.
</p>
',
                'image' => 'news_imagesmens_fashion_2025.jpg',
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => '10 cách đơn giản giúp quý ông mặc đẹp',
                'slug' => '10-cach-dong-gian-giup-quy-ong-mac-dep',
                'content' => 'Nắm vững 10 quy tắc nhỏ dưới đây, quý ông có thể tạo dựng cho mình phong cách lịch lãm và cuốn hút. 1. Chọn quần vừa chân Phụ nữ có thể thiên biến vạn hóa với quần jeans: nào xắn gấu cho style cá tính, nào dài trùm gót sandal cho...',
                'detail' => '<h3>10 Quy Tắc Giúp Quý Ông Tạo Dựng Phong Cách Lịch Lãm</h3>
<p>
    Nắm vững 10 quy tắc nhỏ dưới đây, quý ông có thể tạo dựng cho mình phong cách lịch lãm và cuốn hút.
</p>

<h5>1. Chọn quần vừa chân</h5>
<p>
    Với nam giới, không gì tuyệt hơn một chiếc quần vừa vặn, mang đến cảm giác thoải mái và tự tin khi vận động.  
    Quần quá dài có thể khiến chàng thấp trông càng thấp hơn, trong khi chàng cao lại gặp phải sự vướng víu không cần thiết.  
</p>
<p>
    Tránh chọn quần quá rộng, quá chật hoặc quá mỏng, vì chúng có thể gây bất tiện khi vận động và làm giảm sức cuốn hút của bạn.
</p>

<h5>2. Không biến mình thành "chè thập cẩm"</h5>
<p>
    Nam giới có hai kiểu phối đồ cơ bản: <strong>lịch lãm công sở</strong> và <strong>khỏe khoắn năng động</strong>.  
    Nếu kết hợp cả hai phong cách này trong một bộ trang phục, bạn có thể vô tình làm mất đi sự tinh tế của mình.  
</p>
<p>
    Ví dụ, một chiếc áo sơ mi trắng kết hợp với quần âu và giày thể thao hầm hố có thể khiến bạn mất đi vẻ nam tính.  
    Tương tự, áo pull đi cùng quần âu và giày da bóng loáng cũng là một sự kết hợp không phù hợp.
</p>

<h5>3. Chọn giày có màu sắc và chất liệu phù hợp</h5>
<p>
    Đôi giày tốt không chỉ là giày da hàng hiệu mà còn phải có màu sắc, kiểu dáng phù hợp với gu ăn mặc và hoàn cảnh xuất hiện của bạn.  
    Đừng xem nhẹ điều này vì nó góp phần quan trọng trong việc xây dựng phong cách lịch lãm, nam tính.
</p>

<h5>4. Lựa áo chuẩn, đặc biệt là sơ mi và áo vest</h5>
<p>
    Một chiếc sơ mi quá chật hoặc quá rộng có thể làm mất đi vẻ chỉnh chu của bạn.  
    Đặc biệt khi tham dự những buổi hội thảo quan trọng, một bộ vest quá dài hoặc rộng sẽ khiến bạn trông luộm thuộm.  
</p>
<p>
    Hãy chọn áo vừa vặn với dáng người để luôn giữ được sự lịch lãm.
</p>

<h5>5. Hạn chế đi giày bệt tới công sở</h5>
<p>
    Giày bệt phù hợp với những buổi dã ngoại, picnic hay dạo phố cuối tuần.  
    Tuy nhiên, khi đi làm, giày bệt không đủ độ sang trọng để tạo dựng hình ảnh quý ông.  
</p>

<h5>6. Tối đa một mẫu cho một bộ trang phục</h5>
<p>
    Quý ông nên chọn sẵn một kiểu họa tiết hoặc mẫu thiết kế nhất định cho mỗi bộ trang phục.  
    Điều này giúp tránh những lỗi phối đồ không đáng có và tiết kiệm thời gian mỗi sáng sớm.  
</p>
<p>
    Ví dụ, nếu bạn mặc áo sơ mi họa tiết, hãy cân nhắc caravat đi kèm để tạo sự hài hòa.
</p>

<h5>7. Nên giữ túi áo trống</h5>
<p>
    Nhét quá nhiều vật dụng vào túi áo như sổ tay, bút, khăn mùi xoa, nước hoa... có thể làm áo bị biến dạng, mất đi phom dáng đẹp.  
    Hãy để túi áo trống để giữ nguyên vẻ thanh lịch của bạn.
</p>

<h5>8. Đầu tư một tủ nhỏ tất chân</h5>
<p>
    Quý ông nên có ít nhất 10 đôi tất với nhiều màu sắc và họa tiết khác nhau.  
    Đôi khi, một đôi tất sắc màu có thể giúp bạn tạo điểm nhấn tinh tế cho bộ trang phục.
</p>

<h5>9. Hãy chắc chắn phong cách bạn chọn phù hợp với lứa tuổi</h5>
<p>
    Không khó để bắt gặp quý ông U50 diện vest bó chẽn hoặc trang phục sắc màu rực rỡ như thanh niên.  
    Sự chênh lệch quá lớn giữa style và tuổi tác có thể làm giảm đi vẻ chín chắn, lịch lãm.  
</p>
<p>
    Hãy chọn trang phục phù hợp với lứa tuổi để tôn lên vẻ nam tính, trưởng thành của mình.
</p>

<h5>10. Tìm ra phong cách riêng cho mình</h5>
<p>
    Trong quá trình chọn đồ và phối đồ, hãy lắng nghe nhu cầu của bản thân.  
    Hãy tìm ra màu sắc, kiểu dáng khiến bạn tự tin và thoải mái nhất.  
    Khi đã hài hòa được các yếu tố này, bạn đã có cho mình một phong cách riêng biệt.
</p>
',
                'image' => 'news_imagesmens_fashion_brands.jpg',
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mẹo kiểm tra độ rộng của áo sơmi nam',
                'slug' => 'meo-kiem-tra-do-rong-cua-ao-so-mi',
                'content' => 'Những thủ thuật rất đơn giản nhưng giúp bạn tìm được bộ đồ vừa vặn nhất với cơ thể. 1. Ống tay: Để xác định độ dài phù hợp của ống tay, bạn hãy đứng thẳng lưng, đặt hai tay buông thõng sang hai bên. Độ dài ống tay thích hợp...',
                'detail' => '<h3>Thủ Thuật Giúp Bạn Chọn Đồ Vừa Vặn Với Cơ Thể</h3>
<p>Những thủ thuật rất đơn giản nhưng giúp bạn tìm được bộ đồ vừa vặn nhất với cơ thể.</p>

<h5>1. Ống tay</h5>
<p>
    Để xác định độ dài phù hợp của ống tay, hãy đứng thẳng lưng, thả lỏng hai tay xuống hai bên.  
    Độ dài ống tay thích hợp nhất là ở giữa phần đáy cổ tay (xương nhô ra) và đáy phần khớp ngón tay cái.
</p>

<h5>2. Vai</h5>
<p>
    Áo có phần vai vừa vặn khi đường may nối vai của áo sơ mi thẳng hàng với đầu vai của bạn.  
</p>
<p>
    Nếu không có gương, bạn có thể kiểm tra bằng cách đứng thẳng với một vai dựa vào tường:  
    <ul>
        <li>Nếu không thấy đường may nối vai, áo quá rộng.</li>
        <li>Nếu có khoảng cách lớn giữa đường may vai và tường, áo quá chật.</li>
    </ul>
</p>

<h5>3. Thân áo</h5>
<p>
    Ngoài việc quan sát bằng mắt, bạn có thể kiểm tra độ vừa vặn bằng cách ôm một ai đó.  
    Nếu khi ôm, áo bị căng chặt và gây khó chịu, thì áo quá chật.  
</p>
<p>
    Cách này cũng có thể áp dụng cho các loại áo khoác.
</p>

<h5>4. Cổ áo</h5>
<p>
    Cổ áo sơ mi nên ôm nhẹ phần cổ mà không gây khó thở.  
</p>
<p>
    Áp dụng bài kiểm tra "2 ngón tay":  
    <ul>
        <li>Nếu bạn có thể đặt hai ngón tay vào khoảng trống giữa cổ và cổ áo mà vẫn thấy rộng rãi, thì cổ áo quá rộng.</li>
        <li>Nếu không thể nhét hai ngón tay vào, cổ áo quá chật.</li>
    </ul>
</p>

<h5>5. Quần</h5>
<p>
    Khi chọn quần âu, hãy đảm bảo đường xếp ly thẳng đứng với phần gấu quần gấp nhỏ.  
    Độ dài lý tưởng nằm ở mức <em>half break</em> hoặc <em>quarter break</em>.  
</p>

<h5>6. Ống tay áo khoác</h5>
<p>
    Quy tắc chung là chỉ nên để lộ một chút ống tay áo sơ mi khi mặc áo khoác, không để lộ quá nhiều.
</p>

<h5>7. Độ dài áo khoác</h5>
<p>
    Chiều dài áo khoác phù hợp nhất là khi gấu áo gần bằng với bàn tay khi bạn đang nắm hờ.
</p>

<h5>8. Chọn phong cách áo khoác</h5>
<h3>✔ Bạn gầy và cao</h3>
<p>Có thể thoải mái lựa chọn các kiểu áo khoác như áo 3 cúc, áo 2 cúc, áo 4 cúc...</p>

<h3>✔ Cao và cơ bắp</h3>
<p>
    Thích hợp với áo khoác 2 cúc cổ điển.  
    Nếu có vòng bụng nhỏ, nên chọn áo khoác 1 cúc để tạo vẻ cân đối.  
</p>

<h3>✔ Lùn và gầy</h3>
<p>
    Nên chọn áo đính cúc thấp để tạo hiệu ứng kéo dài cơ thể.  
    Tránh áo có 2 hàng cúc với 3-4 cúc mỗi hàng, vì nó có thể khiến bạn trông thấp hơn.  
</p>

<h3>✔ Thấp và cơ bắp</h3>
<p>
    Nên chọn áo khoác đính cúc thấp để tạo hình chữ V cổ áo, giúp cơ thể trông mảnh và dài hơn.  
    Tránh áo hai hàng cúc với nhiều cúc, vì nó làm tăng bề ngang và khiến bạn trông thấp hơn.  
</p>
',
                'image' => 'news_imageswinter_mens_fashion.jpg',
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Xóa bảng 'news' khi rollback migration
        Schema::dropIfExists('news');
    }
};

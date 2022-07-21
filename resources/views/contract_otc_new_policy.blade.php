<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>HĐ ĐẠI LÝ 2022 - OTC chính sách mới</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allison&display=swap" rel="stylesheet">
</head>
<body>
<table style="width: 100%">
    <tbody>
    <tr>
        <td width="10%" style="text-align: center;padding-right:270px">
            <img width="150" style="margin-bottom:5px"
                 src="https://doppelherz.vn/wp-content/uploads/2022/01/LOGO-DOPPELHERZ-Logo-tren-an-pham-792x800.png"/>
            <h4 style="font-size: 20px"><b>MARTERTRAN</b></h4>
            <h6 style="margin-top: 18px">Số: {{$info['contract_code']}}</h6>
        </td>
        <td width="90%" style="text-align: center;font-size: 20px">
            <h4>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h4>
            <h5>Độc lập - Tự do - Hạnh phúc</h5>
            <h6>----------oOo----------</h6>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;padding: 80px 0 20px 0">
            <h1 style="font-size:20px"><strong>HỢP ĐỒNG ĐẠI LÝ</strong></h1>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="font-size: 18px">
            <p>- <span style="display: inline;">Căn cứ vào Bộ luật dân sự số: 91/2015/QH13, ngày 24/11/2015 Quốc hội Nước CHXHCN Việt Nam.</span>
            </p>
            <br/>
            <p>- Căn cứ Luật Thương mại số: 36/2005/QH11, ngày 14/06/2005 Quốc hội Nước CHXHCN Việt Nam.</p>
            <br/>
            <p>- Căn cứ vào nhu cầu và thỏa thuận của hai bên.</p>
            <br/>
            <p>Hôm nay, ngày……../….…./2022, tại Văn phòng Công ty CP Mastertran chúng tôi gồm:</p>
        </td>

    </tr>
    <tr>
        <td colspan="2" style="padding-top: 20px">
            <table width="100%">
                <tbody>
                <tr>
                    <td width="20%">
                        <h4>BÊN A</h4>
                    </td>
                    <td width="80%" colspan="3"><h4>: CÔNG TY CỔ PHẦN MASTERTRAN</h4></td>
                </tr>
                <tr>
                    <td width="20%">
                        Địa chỉ
                    </td>
                    <td colspan="3" width="80%">: NV4.13 Khu chức năng đô thị Tây Mỗ, P. Tây Mỗ, Q. Nam Từ Liêm, Hà
                        Nội
                    </td>
                </tr>
                <tr>
                    <td width="20%">
                        Điện thoại
                    </td>
                    <td width="20%">: 024.37878408</td>
                    <td width="30%">Mã số thuế : 0105381169</td>
                </tr>
                <tr>
                    <td width="20%">
                        Tài khoản
                    </td>
                    <td colspan="3" width="80%">: {{$info['store_bank_number_doppelherz']}}</td>
                </tr>
                <tr>
                    <td width="20%">
                        Ngân hàng
                    </td>
                    <td colspan="3" width="80%">: {{$info['store_bank_name_doppelherz']}}</td>
                </tr>
                <tr>
                    <td width="20%">
                        Đại diện
                    </td>
                    <td width="30%">: Ông {{$info?->doppelherz?->name}}</td>
                    <td width="50%">Chức danh: Giám đốc bán hàng Vùng 1 - Hà Nội và Tây Bắc</td>
                </tr>
                <tr>
                    <td colspan="2">
                        Theo giấy ủy quyền số: ................................................
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="padding-top: 20px">
            <table width="100%">
                <tbody>
                <tr>
                    <td width="15%">
                        <h4>BÊN B</h4>
                    </td>
                    <td width="80%" colspan="3"><h4>: {{$info['store_name']}}</h4></td>
                </tr>
                <tr>
                    <td width="15%">
                        Địa chỉ
                    </td>
                    <td colspan="3" width="80%">:
                        {{$info->local_dkkd?->name}}, {{$info?->local_dkkd?->parent->name}}
                        , {{$info->local_dkkd?->parent?->parent?->name}}
                    </td>
                </tr>
                <tr>
                    <td style="max-width: 50px">
                        Điện thoại
                    </td>
                    <td width="20%">: {{$info['store_phone']}}</td>
                    <td width="30%">Mã số thuế : {{$info['store_id_Numb_GPDKKD']}}</td>
                </tr>
                <tr>
                    <td style="max-width: 50px">
                        Tài khoản
                    </td>
                    <td colspan="3" width="80%">: {{$info['store_bank_numb']}}</td>
                </tr>
                <tr>
                    <td style="max-width: 50px">
                        Ngân hàng
                    </td>
                    <td colspan="3" width="80%">: {{$info['store_bank']}}</td>
                </tr>
                <tr>
                    <td style="max-width: 50px">
                        Đại diện
                    </td>
                    <td width="30%">: Ông {{$info->partner?->owner_name}}</td>
                    <td width="50%">Chức danh: Chủ đại lý</td>
                </tr>

                </tbody>
            </table>
        </td>
    </tr>

    {{--    dieu khoan 1--}}
    <tr>
        <td style="padding-top: 10px" colspan="2"><h4>Điều 1: PHẠM VI, ĐỐI TƯỢNG CỦA HỢP ĐỒNG.</h4></td>
    </tr>
    <tr>
        <td colspan="2">
            <strong>1.1</strong>
            Bên B đồng ý với Bên A ký hợp đồng làm Đại lý bán lẻ Sản phẩm “chỉ bán tới các khách hàng là Người tiêu dùng
            cuối cùng” theo các điều kiện nêu tại Hợp đồng này, Bên B cam kết chỉ bán tại địa
            bàn:…………………………...…………………...…...………………………………............................................ và trên
            Website/Fanpage thuộc quản lý riêng của Bên B, không bao gồm các gian hàng trên các Trang thương mại điện tử
            trung gian hoặc địa bàn khác.
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <strong>1.2</strong>
            Chi tiết danh mục sản phẩm, giá và chính sách bán hàng <strong>Phụ lục I</strong>.
        </td>
    </tr>
    {{--    dieu khoan 2--}}
    <tr>
        <td style="padding-top: 10px" colspan="2"><h4>Điều 2: ĐẶT HÀNG, GIAO HÀNG VÀ THANH TOÁN</h4></td>
    </tr>
    <tr>
        <td colspan="2">
            <strong>2.1</strong>
            <strong>Đặt hàng:</strong> Khi có nhu cầu đặt hàng, Bên B liên hệ với TDV tại địa bàn hoặc tổng đài 0243
            7878408 (máy lẻ 08). Trong thời hạn 24 giờ làm việc kể từ thời điểm tiếp nhận yêu cầu của Bên B, Bên A sẽ
            xác nhận lại Đơn hàng bằng hình thức tin nhắn/email thông qua số điện thoại/email Bên B dùng để liên hệ.
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <strong>2.2</strong>
            <strong>Giao hàng:</strong> Trước khi giao hàng, Bên A sẽ thông báo đến Bên B thời gian dự kiến giao hàng.
            Khi nhận hàng Bên B cần kiểm tra: Số lượng, chủng loại, trị giá, quyền lợi (nếu có), bao bì nguyên vẹn,
            không bị móp méo, ẩm ướt.... Trường hợp nếu phát hiện bất kỳ thiếu sót nào phải xác nhận với bên Giao vận và
            thông báo ngay cho Bên A để phối hợp xử lý, quá 24 giờ kể từ khi nhận hàng Bên A không chấp nhận các khiếu
            nại liên quan. Nếu Bên B từ chối nhận đơn hàng mà không chứng minh được nguyên nhân do Bên A vi phạm được
            xem như hủy ngang đơn hàng và mọi chi phí giao hàng Bên B chịu trách nhiệm.
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <strong>2.3</strong>
            <strong>Thanh Toán:</strong> Bên B phải thanh toán ngay cho Bên A 100% giá trị đơn hàng hoặc thanh toán
            chuyển khoản trước cho Bên A.
        </td>
    </tr>
    {{--    dieu khoan 3--}}
    <tr>
        <td style="padding-top: 10px" colspan="2"><h4>Điều 3: ĐỔI TRẢ HÀNG HÓA</h4></td>
    </tr>
    <tr>
        <td colspan="2">
            <strong>3.1</strong>
            Khi có vấn đề liên quan đến đổi trả hàng hay các vấn đề thắc mắc, Bên B liên hệ với TDV địa bàn hoặc Công ty
            qua số điện thoại 0243 7878408 (máy lẻ 08).
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <strong>3.2</strong>
            Bên B được quyền đổi, trả Sản Phẩm Lỗi trong các trường hợp sau:
            Bên B phát hiện những lỗi và/hoặc những sai sót của Sản Phẩm (do lỗi của Bên A hoặc nhà sản xuất). Trong
            trường hợp lỗi do nhà sản xuất, bằng chi phí của mình Bên A sẽ thay thế hoặc thu hồi số sản phẩm lỗi cho Bên
            B. Trường hợp do bảo quản không đúng khuyến cáo của nhà sản xuất <strong>Doppelherz</strong> hoặc theo
            <strong>khoản 4.2</strong> của Hợp đồng Bên B phải tự chịu trách nhiệm.
            <br/>
            <p>
                Trong trường hợp Bên B đổi, trả Sản Phẩm Lỗi Bên A sẽ: Nhận lại Sản Phẩm Lỗi theo [giá Bên B đã mua
                từ Bên A]; và đổi Sản Phẩm Lỗi tại địa điểm kinh doanh của Bên B trong vòng 15 ngày kể từ khi Bên A
                nhận được sản phẩm trả lại của Bên B.
            </p>
            <br/>
            <p>
                Bên A đồng ý nhận đổi trả hoặc thu hồi sản phẩm thuộc chương trình bán hàng riêng biệt trong phạm vi
                thỏa thuận giữa Bên A và Bên B.
            </p>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <strong>3.3</strong>
            Thời gian đổi hàng trong vòng 30 ngày kể từ ngày Bên B nhập hàng (chi phí đổi Bên B chịu)
            Ngoài các trường hợp trên Bên B không được đổi trả.
        </td>
    </tr>
    {{--    dieu khoan 4--}}
    <tr>
        <td style="padding-top: 10px" colspan="2"><h4>Điều 4: TRÁCH NHIỆM CỦA CÁC BÊN.</h4></td>
    </tr>
    <tr>
        <td colspan="2">
            <strong>4.1 Quyền và trách nhiệm của Bên A</strong>
            <p>
                Giao hàng đầy đủ, đúng thời hạn, địa điểm và cam kết chất lượng sản phẩm
                Trả lời các thắc mắc về sản phẩm, xử lý các khiếu nại về sản phẩm (nếu có).
                Khi có chương trình khuyến mại, Bên A sẽ thông báo tới Bên B trước 10 ngày. Đồng thời Bên A không có
                trách nhiệm bổ sung quyền lợi cho Bên B đối với những đơn hàng phát sinh trước thời điểm thông báo.
            </p>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <strong>4.2 Quyền và trách nhiệm của Bên B</strong>
            <p>
                - Bên B có trách nhiệm cung cấp giấy đăng ký kinh doanh, mã số thuế, email đăng ký với cục thuế đầy đủ.
            </p>
            <p>
                - Sản phẩm được bảo quản ở nhiệt độ dưới 25 độ C trong suốt quá trình từ khi nhập đến khi xuất hàng.
            </p>
            <p>
                - Bên B cam kết chỉ bán hàng chính hãng Doppelherz, được phân phối trực tiếp từ bên A.
            </p>
            <p>
                - Bên B có quyền được sử dụng thương hiệu để quảng bá, tư vấn các sản phẩm <strong>Doppelherz</strong>
                trên phạm vi <strong>Điều 1.</strong> Bên B không được quyền ủy lại cho bên thứ 3 được sử dụng thương
                hiệu <strong>Doppelherz</strong> .
            </p>
            <p>
                - Mọi nghĩa vụ phát sinh liên quan đến quy định về thuế do Bên B chịu trách nhiệm.
            </p>
        </td>
    </tr>
    {{--    dieu khoan 5--}}
    <tr>
        <td style="padding-top: 10px" colspan="2"><h4>Điều 5: XỬ LÝ TRƯỜNG HỢP VI PHẠM HỢP ĐỒNG VÀ CHẤM DỨT HỢP
                ĐỒNG.</h4></td>
    </tr>
    <tr>
        <td colspan="2">
            <strong>5.1</strong>
            Bên A có quyền đơn phương chấm dứt Hợp đồng trong trường hợp Bên B vi phạm bất cứ điều khoản nào của Hợp
            đồng, bao gồm nhưng không giới hạn các trường hợp sau:
            <p>
                - Bên B bán buôn Sản phẩm cho khách hàng khác sử dụng vào mục đích thương mại bán lại hoặc bán ra ngoài
                địa bàn vi phạm khoản 1.1 Điều 1 của Hợp đồng.
            </p>
            <p>
                - Bên B bán sản phẩm tới khách hàng thấp hơn giá bán lẻ tối thiểu mà Bên A quy định tại Phụ Lục I.
            </p>
            <p>
                - Bên B đơn phương chấm dứt hợp đồng thì phải gửi văn bản cho Bên A trước 30 ngày.
            </p>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <strong>5.2</strong>
            Bên B chấm dứt Hợp đồng, mọi quyền lợi của Bên B, kể cả các quyền lợi chưa thanh toán bị hủy bỏ.
        </td>
    </tr>
    {{--    dieu khoan 6--}}
    <tr>
        <td style="padding-top: 10px" colspan="2"><h4>Điều 6: ĐIỀU KHOẢN CHUNG.</h4></td>
    </tr>
    <tr>
        <td colspan="2">
            <strong>6.1</strong>
            Hai bên cam kết nỗ lực thực hiện các điều khoản trong hợp đồng này. Nếu có bất cứ tranh chấp nào phát sinh
            mà không thể giải quyết thông qua hòa giải, thương lượng giữa các bên trong vòng 30 ngày kể từ khi bắt đầu
            thảo luận, thì tranh chấp đó có thể được một trong các bên trình lên các Tòa án có thẩm quyền của Việt Nam
            để giải quyết. Bên thua kiện sẽ chịu toàn bộ các chi phí liên quan.
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <strong>6.2</strong>
            Hợp Đồng này có hiệu lực kể từ ngày ký đến hết ngày ........../........./2022. <strong><i> Khi kết thức hợp
                    đồng nếu hai bên không thông báo thay đổi hiệu lực hợp đồng thì Hợp đồng sẽ tự động được gia
                    hạn.</i></strong>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <strong>6.3</strong>
            Hợp đồng được lập thành 02 bản có giá trị pháp lý như nhau, mỗi bên giữ 01 bản làm căn cứ thực hiện
        </td>
    </tr>
    <tr>
        <td width="50%" style="text-align: center;padding-top: 10px">
            <p style="text-align: center;"><strong>ĐẠI DIỆN BÊN A</strong></p>
            <p><strong> </strong></p>
            <div style="width: 200px;height: 200px">
                @if($info->store_sign_img_doppelherz)
                    <img style="width: 250px;height: 250px;object-fit: contain"
                         src="{{public_path($info->doppelherz?->image)}}">
                @else
                    <img style="width: 250px;height: 250px;object-fit: contain"
                         src="{{public_path("/images/white.png")}}">
                @endif
            </div>
            {{--                        <span style="font-weight: bold;font-size: 16px">{{$info['name_doppelherz']}}</span>--}}
            @if($info->store_sign_img_doppelherz)
                <span style="font-weight: bold;font-size: 16px">{{$info->doppelherz?->name}}</span>
            @endif
        </td>
        <td width="50%" style="text-align: center;padding-top: 10px">
            <p style="text-align: center;"><strong>ĐẠI DIỆN BÊN B</strong></p>
            <p><strong> </strong></p>
            <div style="object-fit: contain">
                @if($info->store_sign_img)
                    <img style="width: 250px;height: 250px;object-fit: contain" src="{{$info->store_sign_img}}">
                @else
                    <img style="width: 250px;height: 250px;object-fit: contain"
                         src="{{public_path("/images/white.png")}}">
                @endif
            </div>
            @if($info->store_sign_img)
                <span style="font-weight: bold;font-size: 16px">{{$info?->partner?->owner_name}}</span>
            @endif

        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center">
            <h2>PHỤ LỤC I: DANH MỤC SẢN PHẨM VÀ CHÍNH SÁCH BÁN HÀNG</h2>
            <p>(Đính kèm hợp đồng số: .............................../2022/HĐĐL ký
                ngày:.............................)</p>
            <table border="1" width="100%" cellspacing="0" cellpadding="5">
                <tbody>
                <tr style="height: 61px;">
                    <td style="width: 36px; text-align: center; height: 61px;">
                        <p><strong>Số<br/> TT</strong></p>
                    </td>
                    <td style="width: 52px; text-align: center; height: 61px;">
                        <p style="text-align: center;"><strong>Nhóm sản phẩm</strong></p>
                    </td>
                    <td style="width: 422.312px; text-align: center; height: 61px;">
                        <p style="text-align: center;"><strong>Tên sản phẩm</strong></p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 61px;">
                        <p><strong>Giá trước VAT<br/> (VNĐ/hộp) </strong></p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 61px;">
                        <p><strong>Giá niêm yết <br/> (VNĐ/hộp) </strong></p>
                    </td>
                </tr>
                <tr style="height: 35px;">
                    <td style="width: 36px; text-align: center; height: 35px;">
                        <p>1</p>
                    </td>
                    <td style="width: 52px; text-align: center; height: 166px;" rowspan="5">
                        <p><strong>Sản phẩm truyền thông</strong></p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 35px;">
                        <p><strong>Vital Pregna</strong>: Bổ bà bầu (Hộp 3 vỉ * 10 viên)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 35px;">
                        <p>300.000</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 35px;">
                        <p>324.000</p>
                    </td>
                </tr>
                <tr style="height: 48px;">
                    <td style="width: 36px; text-align: center; height: 48px;">
                        <p>2</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 48px;">
                        <p><strong>Kinder Optima</strong>: Giúp kích thích tiêu hóa, nâng cao hệ miễn dịch. (Hộp 1 chai
                            100ml)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 48px;">
                        <p>281.818</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 48px;">
                        <p>304.364</p>
                    </td>
                </tr>
                <tr style="height: 35px;">
                    <td style="width: 36px; text-align: center; height: 35px;">
                        <p>3</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 35px;">
                        <p><strong>A-Z Fizz</strong>: Bổ sung 21 vi chất giúp tăng cường sức khỏe (tuýp 13 viên)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 35px;">
                        <p>70.909</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 35px;">
                        <p>76.582</p>
                    </td>
                </tr>
                <tr style="height: 48px;">
                    <td style="width: 36px; text-align: center; height: 48px;">
                        <p>4</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 48px;">
                        <p><strong>Aktiv Meno</strong>: Sản phẩm cho phụ nữ tiền mãn kinh, mãn kinh; bổ sung estrogen tự
                            nhiên,
                            chống loãng xương (Hộp 2 vỉ * 10 viên)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 48px;">
                        <p>245.455</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 48px;">
                        <p>265.092</p>
                    </td>
                </tr>
                <tr style="height: 48px;">
                    <td style="width: 36px; text-align: center; height: 48px;">
                        <p>5</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 48px;">
                        <p><strong>A-Z Depot: </strong>Bổ sung Vitamin &amp; khoáng chất giúp tăng cường sức khỏe, tăng
                            cường sức đề
                            kháng (Hộp 30 viên)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 48px;">
                        <p>313.636</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 48px;">
                        <p>338.727</p>
                    </td>
                </tr>
                <tr style="height: 48px;">
                    <td style="width: 36px; text-align: center; height: 48px;">
                        <p>6</p>
                    </td>
                    <td style="width: 52px; text-align: center; height: 943px;" rowspan="21">
                        <p><strong>Sản phẩm tư vấn</strong></p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 48px;">
                        <p><strong>Kinder Active D3 Drops</strong>: Giúp xương chắc khỏe, hỗ trợ chuyển hóa và hấp thu
                            Calci (Hộp 1
                            chai 30ml)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 48px;">
                        <p>209.091</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 48px;">
                        <p>225.819</p>
                    </td>
                </tr>
                <tr style="height: 48px;">
                    <td style="width: 36px; text-align: center; height: 48px;">
                        <p>7</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 48px;">
                        <p><strong>Magnesium + Calcium + D3</strong>: Giúp bổ xung Calci, Magie và D3 cần thiết cho sự
                            phát triển
                            của cơ và xương cơ thể (Hộp 3 vỉ *10 viên)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 48px;">
                        <p>300.000</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 48px;">
                        <p>324.000</p>
                    </td>
                </tr>
                <tr style="height: 48px;">
                    <td style="width: 36px; text-align: center; height: 48px;">
                        <p>8</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 48px;">
                        <p><strong>Zincodin</strong>: Giúp bổ sung kẽm và L-histidine giúp cơ thể tăng hấp thu kẽm. (Hộp
                            30
                            viên)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 48px;">
                        <p>199.074</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 48px;">
                        <p>215.000</p>
                    </td>
                </tr>
                <tr style="height: 48px;">
                    <td style="width: 36px; text-align: center; height: 48px;">
                        <p>9</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 48px;">
                        <p><strong>Haemo Vital</strong>: Cung cấp sắt và các vitamin cho quá trình tạo máu giúp phòng
                            ngừa và hỗ trợ
                            thiếu máu do thiếu sắt (Hộp 2 vỉ * 15 viên)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 48px;">
                        <p>322.727</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 48px;">
                        <p>348.546</p>
                    </td>
                </tr>
                <tr style="height: 35px;">
                    <td style="width: 36px; text-align: center; height: 35px;">
                        <p>10</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 35px;">
                        <p><strong>Coenzym Q10</strong>: Hỗ trợ điều trị suy tim, các bệnh tim mạch (Hộp 30 viên)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 35px;">
                        <p>300.000</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 35px;">
                        <p>324.000</p>
                    </td>
                </tr>
                <tr style="height: 35px;">
                    <td style="width: 36px; text-align: center; height: 35px;">
                        <p>11</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 35px;">
                        <p><strong>Eye Vital:</strong> Bổ mắt, tăng cường thị lực (Hộp 30 viên)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 35px;">
                        <p>313.636</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 35px;">
                        <p>338.727</p>
                    </td>
                </tr>
                <tr style="height: 61px;">
                    <td style="width: 36px; text-align: center; height: 61px;">
                        <p>12</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 61px;">
                        <p><strong>Prostacalm:</strong> Giúp ngăn ngừa và hạn chế sự phát triển của u xơ; giảm các triệu
                            chứng tiểu
                            tiện do bệnh phì đại tiền liệt tuyến lành tính (Hộp 3 vỉ * 10 viên)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 61px;">
                        <p>322.727</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 61px;">
                        <p>348.546</p>
                    </td>
                </tr>
                <tr style="height: 48px;">
                    <td style="width: 36px; text-align: center; height: 48px;">
                        <p>13</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 48px;">
                        <p><strong>Joints ULTRA:</strong> Giảm các triệu chứng thoái hóa khớp, bảo vệ sụn khớp, bôi trơn
                            khớp(Hộp 30
                            viên)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 48px;">
                        <p>436.364</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 48px;">
                        <p>471.274</p>
                    </td>
                </tr>
                <tr style="height: 35px;">
                    <td style="width: 36px; text-align: center; height: 35px;">
                        <p>14</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 35px;">
                        <p><strong>Omgea 3 + Acid Folic + B6 +B12</strong> (Hộp 30 viên)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 35px;">
                        <p>250.000</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 35px;">
                        <p>270.000</p>
                    </td>
                </tr>
                <tr style="height: 35px;">
                    <td style="width: 36px; text-align: center; height: 35px;">
                        <p>15</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 35px;">
                        <p><strong>Belle Anti Aging</strong>: Chống lão hóa (Hộp 30 viên)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 35px;">
                        <p>300.000</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 35px;">
                        <p>324.000</p>
                    </td>
                </tr>
                <tr style="height: 48px;">
                    <td style="width: 36px; text-align: center; height: 48px;">
                        <p>16</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 48px;">
                        <p><strong>Kinder Immune Syrup:</strong> Tăng cường miễn dịch, tăng sức đề kháng. (Hộp 1 chai
                            150ml)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 48px;">
                        <p>360.000</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 48px;">
                        <p>388.800</p>
                    </td>
                </tr>
                <tr style="height: 61px;">
                    <td style="width: 36px; text-align: center; height: 61px;">
                        <p>17</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 61px;">
                        <p><strong>Liver Complex:</strong> Hỗ trợ thanh nhiệt, tăng giải độc gan và duy trì chức năng
                            gan, giúp bảo
                            vệ gan khỏi tổn thương do sử dụng bia và các hóa chất độc hại cho gan (Hộp 3 vỉ * 10 viên)
                        </p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 61px;">
                        <p>322.727</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 61px;">
                        <p>348.546</p>
                    </td>
                </tr>
                <tr style="height: 35px;">
                    <td style="width: 36px; text-align: center; height: 35px;">
                        <p>18</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 35px;">
                        <p><strong>Active Men Plus: </strong>Sản phẩm hỗ trợ tăng sinh lý nam giới (Hộp 30 viên)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 35px;">
                        <p>454.545</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 35px;">
                        <p>490.909</p>
                    </td>
                </tr>
                <tr style="height: 35px;">
                    <td style="width: 36px; text-align: center; height: 35px;">
                        <p>19</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 35px;">
                        <p><strong>Thymepect for kids:</strong> Long đờm, diệt khuẩn, giảm ho (Hộp 1 chai 100ml)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 35px;">
                        <p>200.000</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 35px;">
                        <p>216.000</p>
                    </td>
                </tr>
                <tr style="height: 48px;">
                    <td style="width: 36px; text-align: center; height: 48px;">
                        <p>20</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 48px;">
                        <p><strong>Calciovin Liquid:</strong> Hỗ trợ hệ răng, xương hình thành và phát triển vững chắc,
                            khỏe mạnh.
                            (Hộp 1 chai 200ml)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 48px;">
                        <p>416.364</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 48px;">
                        <p>449.674</p>
                    </td>
                </tr>
                <tr style="height: 48px;">
                    <td style="width: 36px; text-align: center; height: 48px;">
                        <p>21</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 48px;">
                        <p><strong>Kinder Omega-3 Syrup:</strong> Hỗ trợ sự phát triển não bộ và khả năng nhận thức, hỗ
                            trợ trị tăng
                            động và giảm chú ý (Hộp 1 chai 250ml)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 48px;">
                        <p>441.818</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 48px;">
                        <p>477.164</p>
                    </td>
                </tr>
                <tr style="height: 48px;">
                    <td style="width: 36px; text-align: center; height: 48px;">
                        <p>22</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 48px;">
                        <p><strong>Iron drops: </strong>Bổ sung muối sắt giúp giảm nguy cơ thiếu máu do thiếu sắt ở trẻ
                            em hoặc
                            người lớn. (Hộp 1 chai 30ml)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 48px;">
                        <p>270.909</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 48px;">
                        <p>292.582</p>
                    </td>
                </tr>
                <tr style="height: 35px;">
                    <td style="width: 36px; text-align: center; height: 35px;">
                        <p>23</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 35px;">
                        <p><strong>Belle Hairnakin:</strong> Làm đẹp da, tóc, móng (Hộp 30 viên )</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 35px;">
                        <p>269.091</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 35px;">
                        <p>290.618</p>
                    </td>
                </tr>
                <tr style="height: 48px;">
                    <td style="width: 36px; text-align: center; height: 48px;">
                        <p>24</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 48px;">
                        <p><strong>Hair plus:</strong> Bổ sung dưỡng chất: giúp dưỡng tóc, tóc mọc chắc khỏe, ngăn ngừa
                            rụng tóc
                            (Hộp 3 vỉ * 10 viên)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 48px;">
                        <p>495.455</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 48px;">
                        <p>535.092</p>
                    </td>
                </tr>
                <tr style="height: 48px;">
                    <td style="width: 36px; text-align: center; height: 48px;">
                        <p>25</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 48px;">
                        <p><strong>Anti stress:</strong> Giảm căng thẳng, giảm đau đầu, Tăng trí nhớ, tăng tuần hoàn,
                            ngừa đột quỵ,
                            giúp dễ ngủ, ngủ ngon (Hộp 2 vỉ * 15 viên)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 48px;">
                        <p>304.545</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 48px;">
                        <p>328.909</p>
                    </td>
                </tr>
                <tr style="height: 48px;">
                    <td style="width: 36px; text-align: center; height: 48px;">
                        <p>26</p>
                    </td>
                    <td style="width: 422.312px; text-align: left; height: 48px;">
                        <p><strong>Ginko+B-Vitamins+Choline:</strong>Tăng cường tuần hoàn não, tăng cường khả năng tập
                            trung và cải thiện trí nhớ. (Hộp 30 viên)</p>
                    </td>
                    <td style="width: 76.6875px; text-align: center; height: 48px;">
                        <p>310.185</p>
                    </td>
                    <td style="width: 77px; text-align: center; height: 48px;">
                        <p>335.000</p>
                    </td>
                </tr>
                </tbody>
            </table>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
        </td>
    </tr>

    <tr>
        <td colspan="2" style="text-align: center;">
            <h2>PHỤ LỤC II: CHÍNH SÁCH BÁN HÀNG</h2>
            <p>(Đính kèm Hợp đồng số ……………….…/2022/HĐĐL ký ngày …………………… )</p>
        </td>
    </tr>
    <tr>
        <td style="padding-top: 10px" colspan="2"><h4>2.1. Bên B được hưởng CKTM ngay trên đơn hàng: Khi mua 5h tặng 1h
                đối với một loại sản phẩm.</h4></td>
    </tr>
    <tr>
        <td style="padding-top: 10px" colspan="2">
            <h4>2.2 Đồng thời, bên B được hưởng CKTM bằng tiền đối với mỗi nhãn sản phẩm đạt điều kiện số lượng
                bán ngay trên đơn như sau:</h4>
            <table border="1" width="100%" cellspacing="0" cellpadding="5">
                <tbody>
                <tr>
                    <td><strong>Số lượng bán mỗi nhãn/đơn</strong></td>
                    <td><strong>≥ 10 hộp</strong></td>
                    <td><strong>≥ 20 hộp</strong></td>
                    <td><strong>≥ 35 hộp</strong></td>
                    <td><strong>≥ 50 hộp</strong></td>
                </tr>
                <tr>
                    <td><strong>Chiết khấu thương mại</strong></td>
                    <td>3%</td>
                    <td>5%</td>
                    <td>6%</td>
                    <td>7%</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td style="padding-top: 10px" colspan="2">
            <h4>2.3 Bên B được hưởng CKTM bổ sung Quý trên tổng doanh số Quý khi đạt số lượng nhãn sản phẩm
                active theo Qúy đạt điều kiện như sau:</h4>
            <table border="1" width="100%" cellspacing="0" cellpadding="5">
                <tbody>
                <tr>
                    <td><strong>Số lượng nhãn</strong></td>
                    <td><strong>≥ 3 nhãn</strong></td>
                    <td><strong>≥ 5 nhãn</strong></td>
                    <td><strong>≥ 7 nhãn</strong></td>
                </tr>
                <tr>
                    <td><strong>Chiết khấu
                            thương mại</strong></td>
                    <td>3%</td>
                    <td>5%</td>
                    <td>7%</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td style="padding-top: 10px" colspan="2">
            <h4>2.4 Bên B được hưởng CKTM bổ sung khi đạt tổng doanh số cam kết tính đến 31/03/2023 như sau:</h4>
            <table border="1" width="100%" cellspacing="0" cellpadding="5">
                <tbody>
                <tr>
                    <td><strong>Doanh số năm
                            (VNĐ)</strong></td>
                    <td><strong>≥ 60.000.000</strong></td>
                    <td><strong>≥ 120.000.000</strong></td>
                    <td><strong>≥ 180.000.000</strong></td>
                    <td><strong>≥ 240.000.000</strong></td>
                    <td><strong>≥ 300.000.000</strong></td>
                </tr>
                <tr>
                    <td><strong>Chiết khấu
                            thương mại</strong></td>
                    <td>3%</td>
                    <td>4%</td>
                    <td>5%</td>
                    <td>5%</td>
                    <td>7%</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td style="padding-top: 10px;font-size: 18px" colspan="2">
            <h4>2.3 Diễn giải nội dung chính sách:</h4>
            <p>&#x21d2; Doanh số (DS) tính theo giá chưa bao gồm GTGT (VAT) của sản phẩm mà Công ty bán cho Đại lý
                (không
                bao gồm trị giá của phần hàng tặng), được ghi nhận theo đơn đặt hàng trước 12h00 ngày làm việc cuối
                cùng của tháng.</p>
            <p>&#x21d2; Nhãn sản phẩm active Qúy là của Đại lý là nhãn sản phẩm có số lượng hàng bán (theo đơn đặt hàng
                hợp lệ, không bao gồm hàng tặng) từ 18 hộp SP mỗi loại/quý với sản phẩm tư vấn, và đạt từ 30 hộp mỗi
                loại/quý với sản phẩm truyền thông</p>
            <p>&#x21d2; Chiết khấu thương mại bổ sung dành cho bên B có hợp tác từ 2 tháng mỗi Quý và đã hoàn thành điều
                kiện nhãn active Quý.</p>
            <p>&#x21d2; Chiết khấu quý được chi trả (và cấn trừ) vào lần đặt hàng của đơn hàng sau ngày 10 của Quý tiếp
                theo.</p>
            <p>&#x21d2; Chiết khấu áp dụng và chi trả khi bên B không vi phạm các điều khoản đã cam kết trong hợp
                đồng.</p>
            <p>&#x21d2; Toàn bộ các khoản chiết khấu và quyền lợi thương mại đều được công ty xuất hóa đơn GTGT theo quy
                định của nhà nước.</p>
            <p>&#x21d2; Đơn hàng nào phát sinh thì Hóa đơn, chứng từ sẽ đi kèm với Đơn hàng đó.</p>
        </td>
    </tr>
    <tr>
        <td width="50%" style="text-align: center;padding-top: 10px">
            <p style="text-align: center;"><strong>ĐẠI DIỆN BÊN A</strong></p>
            <p><strong> </strong></p>
            <div style="width: 200px;height: 200px">
                @if($info->store_sign_img_doppelherz)
                    <img style="width: 250px;height: 250px;object-fit: contain"
                         src="{{public_path($info->doppelherz?->image)}}">
                @else
                    <img style="width: 250px;height: 250px;object-fit: contain"
                         src="{{public_path("/images/white.png")}}">
                @endif
            </div>
            {{--                        <span style="font-weight: bold;font-size: 16px">{{$info['name_doppelherz']}}</span>--}}
            @if($info->store_sign_img_doppelherz)
                <span style="font-weight: bold;font-size: 16px">{{$info->doppelherz?->name}}</span>
            @endif
        </td>
        <td width="50%" style="text-align: center;padding-top: 10px">
            <p style="text-align: center;"><strong>ĐẠI DIỆN BÊN B</strong></p>
            <p><strong> </strong></p>
            <div style="object-fit: contain">
                @if($info->store_sign_img)
                    <img style="width: 250px;height: 250px;object-fit: contain" src="{{$info->store_sign_img}}">
                @else
                    <img style="width: 250px;height: 250px;object-fit: contain"
                         src="{{public_path("/images/white.png")}}">
                @endif
            </div>
            @if($info->store_sign_img)
                <span style="font-weight: bold;font-size: 16px">{{$info?->partner?->owner_name}}</span>
            @endif

        </td>
    </tr>
    </tbody>
</table>
</body>
</html>

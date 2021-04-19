<img style="width:680px; margin-top:25px;" src="image/html.png" />
        <h1 style="margin-top:20px;">Html Nedir ?</h1>
          <p>HTML “Hyper Text Markup Language” kelimelerinin kısaltılmasından oluşur. Türkçe anlamı Zengin metin işaretleme dilidir. Web sitesi oluşturmak için kullanılır. Uzantısı .html veya .htm şeklinde tanımlanır.<br>

HTML dili tag yapısından oluşur. Genel olarak şeklinde tanımlanmış alanlar arasında işlemler yapılır. Burada dikkat edilmesi gereken nokta, etiketlerin açılması ve kapatılması olayıdır.<br>

İstisnalar olsa da genel anlamda her etiketin kapatılması gerekir.<br>

HTML bir programlama dili olmadığı için derlenme gibi bir gereksinimi yoktur. Standart bir metin belgesinin uzantısını .html yapıp kaydetmemiz halinde dosyamızı direk tarayıcı üzerinde görüntüleyebilir ve değişikler yapabiliriz.</p><br><br>

       <h1>Html Ne İşe Yarar ?</h1>
          <p>Html, bir web sitesinde yazı, metin, link veya resimlerin eklenmesini sağlar.bir web sitenin iskeleti gibidir. İskeleti olmayan bir web site düşünülemeyeceği için html’yi kullanırız.</p>
          
          <br><br><br>
          
          <img style="width:680px" src="image/html2.png" /><br><br><br>
            <h1> < html >  < /html ></h1>
            <p>html etiketi web sitemizin tüm kodlarını kapsayan etikettir. Yani tarayıcılara <strong>“ben html ile yazıldım”</strong> ve <strong>“benim uzantım .html”</strong> diye haber verir. Genelde tüm web sitelerinin anasayfa dosyaları <strong>index.html</strong> olarak kaydedilir.</p><br><br>
            
            <div class="syntax" style="position:relative; width:auto; height:61px;">
            <table>
            <tbody>
            <tr>
            <td>
            <pre style="background-color:skyblue; text-align:center;">
1
2
3
            </pre>
            </td>
            <td class="yazi">  
            <pre class="span"><strong>< html ></strong>
<span style="background-color:#FFF;width:%100; display:block">          Tüm HTML kodlarımız html etiketleri arasına yazılır </span><strong>< /html ></strong>
            </pre>
            </td>
            </tr>
            </tbody>
            </table>
            </div>
            
            <br><br>
            
            <h1> < head >  < /head ></h1>
            <p><strong>head</strong> etiketi, web sitemizin baş kısımını oluşturan etikettir. Bu kısıma web sitemizin özelliklerini, içeriğini, web sitesinin yazarını, web sitesinin hangi konu ile alakalı olduğunu belirten kodlamalar gelir.</p><br><br>
            
            <div class="syntax" style="position:relative; width:auto; height:100px;">
            <table>
            <tbody>
            <tr>
            <td>
            <pre style="background-color:skyblue; text-align:center; height:96px;">
1
2
3
4
5
            </pre>
            </td>
            <td>  
            <pre class="pre1"><span class="span1"><strong>< html ></strong></span>   <strong>< head ></strong><span class="span1">      <strong>< title ></strong> Sayfanın başlığı <strong>< /title ></strong></span>   <strong>< /head ></strong><span class="span1"><strong>< /html ></strong></span>
            </pre>
            </td>
            </tr>
            </tbody>
            </table>
            </div>
            
            <br><br>
           <div class="blockquote">
           <strong>head</strong> etiketinin içine <strong>title</strong> etiketinin yazılması zorunludur. Çünkü title sitemizin başlığı olacaktır.
            </div><br><br>
          
           <br><br><br>
            <h1> < title >  < /title ></h1>
            <p><strong>title</strong> etiketi sitemizin başlığını belirler.<strong> title </strong> etiketleri arasına yazacağımız başlık sitemizin içeriği ile alakalı olması web sitemizin tanımlanması açımızdan daha iyi olacaktır.</p><br><br>
            
            <p><img src="image/title.png" /></p>
             
             <br><br>
             
            <h1> < meta >  < /meta ></h1>
            <p><strong>meta</strong> etiketleri, oluşturmuş olduğumuz html sayfanın tanımlarını yapmamıza ve anahtar kelimeler(keywords) ile sayfamızı tanımlamamıza olanak sağlar. Şimdi sizlere birkaç önemli meta etiketini tanıyalım.</p>
<br><br>
<p><strong>meta</strong> etiketi ile web sitemizin karakter tanımlamasını yapabiliriz.</p><br><br>

<div class="syntax" style="position:relative; width:auto; height:119px;">
            <table>
            <tbody>
            <tr>
            <td>
            <pre style="background-color:skyblue; text-align:center; height:115px;">
1
2
3
4
5
6
            </pre>
            </td>
            <td>  
            <pre class="pre2"><span class="span1"><strong>< html ></strong></span><strong>< head ></strong><span class="span1"><strong>< title ></strong> Sayfanın başlığı <strong>< /title ></strong></span><strong>< meta</strong> charset=<span style="color:red">"utf-8"</span> ><span class="span1"><strong>< /head ></strong></span><strong>< /html ></strong>
            </pre>
            </td>
            </tr>
            </tbody>
            </table>
            </div>




<p><strong>meta – keywords:</strong> Sitemiz ile alakalı anahtar kelimeleri göstermemize yarar. Örneğin; Web Sitesi yapımı hakkında bilgiler veren bir site yapıyorsak anahtar kelimelerimiz, html, css, javascript, php, asp
gibi anahtarlardan oluşmalıdır.</p><br><br>
            
            <div class="syntax" style="position:relative; width:auto; height:119px;">
            <table>
            <tbody>
            <tr>
            <td>
            <pre style="background-color:skyblue; text-align:center; height:115px;">
1
2
3
4
5
6
            </pre>
            </td>
            <td>  
            <pre class="pre2"><span class="span1"><strong>< html ></strong></span><strong>< head ></strong><span class="span1"><strong>< title ></strong> Sayfanın başlığı <strong>< /title ></strong></span><strong>< meta</strong> name=<span style="color:red">"keywords"</span> CONTENT=<span style="color:red">"etiket1, etiket2, etiket3, ..."</span> ><span class="span1"><strong>< /head ></strong></span><strong>< /html ></strong>
            </pre>
            </td>
            </tr>
            </tbody>
            </table>
            </div>
            
            <br>
            
            <p><strong>meta-description:</strong>  Sitenizin içeriği hakkında bilgi veren bir etikettir. Google, Yahoo, Bing Yandex botları sitenizi siyaret edip içeriğiniz hakkında bilgi toplarlar ve bu bilgileri kendi kayıtlarında tutarlar. Sitenizin hangi aramalara dahil olacağını bu etiketlere bakarak belirlerler. Mesela yukarıdaki örnekte Web sitesi ile alakalı anahtar kelimeler belirtmiştir ve bu kelimeler arama motorlarında aratıldığında sizin siteniz bu aramaya dahil olur. peki kaçıncı sayfada çıkarsınız? orası da sitenizin günlük yada aylık ne kadar ziyaretçi çektiğine veya sitenizdeki bilgilerin ne kadar özgün ve güncel olduğuna bağlıdır.
            </p><br><br>
            
            <div class="syntax" style="position:relative; width:auto; height:119px;">
            <table>
            <tbody>
            <tr>
            <td>
            <pre style="background-color:skyblue; text-align:center; height:115px;">
1
2
3
4
5
6
            </pre>
            </td>
            <td>  
            <pre class="pre2"><span class="span1"><strong>< html ></strong></span><strong>< head ></strong><span class="span1"><strong>< title ></strong> Sayfanın başlığı <strong>< /title ></strong></span><strong>< meta</strong> name=<span style="color:red">"description"</span> CONTENT=<span style="color:red">"Sitenizin Konusu"</span> ><span class="span1"><strong>< /head ></strong></span><strong>< /html ></strong>
            </pre>
            </td>
            </tr>
            </tbody>
            </table>
            </div>
            
            <br><br>
            
            <div class="blockquote">
            <strong>Not:</strong> <strong>meta</strong> etiketleri <strong>head</strong> etiketleri arasına yazılmalıdır.
            </div>
            
            <br><br>
            
            <h1> < body >  < /body ></h1>
            <p><strong>body</strong> etiketi web sitemizin geri kalan tüm içeriğini kapsayacak olan etikettir yani Gövde diye tabir ettiğimiz kısımdır. Sitemizin tüm içeriği <strong>body</strong> etiketleri arasına yazılır.</p>
<br><br>

<div class="syntax" style="position:relative; width:auto; height:176px;">
            <table>
            <tbody>
            <tr>
            <td>
            <pre style="background-color:skyblue; text-align:center; height:172px;">
1
2
3
4
5
6
7
8
9
            </pre>
            </td>
            <td>  
            <pre class="pre3"><span class="span1"><strong>< html ></strong></span><strong>   < head ></strong><span class="span1"><strong>      < title ></strong> Sayfanın başlığı <strong>< /title ></strong></span><strong>      < meta</strong> charset="utf-8" ><span class="span1"><strong>   < /head ></strong></span><strong>   < body ></strong><span class="span1">      Sitemizin tüm içeriği bu etiket arasına yazılacaktır.</span><strong>   < /body >
</strong><span class="span1"><strong>< /html ></strong></span>
            </pre>
            </td>
            </tr>
            </tbody>
            </table>
            </div>
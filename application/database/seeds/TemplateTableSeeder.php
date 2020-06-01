<?php

use Illuminate\Database\Seeder;
use App\Models\Template\Template;
use Illuminate\Database\Eloquent\Model;

class TemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Template::insert([
            array('id' => '1','name' => 'Happy Birthday','template' => '<p style=""><br></p><h1 class="size-30" style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #b59859;font-size: 26px;line-height: 34px;text-align: center;" lang="x-size-30">— Happy Birthday&nbsp;—</h1><p><br></p><h2 class="size-24" style="Margin-top: 20px;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #555;font-size: 20px;line-height: 28px;font-family: " pt="" sans","trebuchet="" ms",sans-serif;text-align:="" center;"="" lang="x-size-24" align="center">How are you doing?</h2><p><br></p><p class="size-16" style="Margin-top: 16px;Margin-bottom: 20px;font-size: 16px;line-height: 24px;text-align: center;" lang="x-size-16"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p><p class="size-16" style="Margin-top: 16px;Margin-bottom: 20px;font-size: 16px;line-height: 24px;text-align: center;" lang="x-size-16"><span style="border-radius: 4px;display: inline-block;font-size: 14px;font-weight: bold;line-height: 24px;padding: 12px 24px;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #fff;background-color: #cca95e;font-family: \'PT Serif\', Georgia, serif;">Love you!</span> <br></p><div style="Margin-left: 20px;Margin-right: 20px;">
      <div style="line-height:5px;font-size:1px">&nbsp;</div></div>','created_at' => '2016-06-23 16:40:03','updated_at' => '2016-06-28 14:08:20'),
            array('id' => '2','name' => 'Hotel Booking','template' => '<div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Where do you want to go in this holidays.<br> <br><div style="margin-left: 45px; margin-right: 20px; margin-bottom: 24px;">
      <div class="btn btn--flat btn--large" style="text-align: center; margin-left: 300px;">
        <a target="_blank" style="border-radius: 4px;display: inline-block;font-size: 14px;font-weight: bold;line-height: 24px;padding: 12px 24px;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #fff;background-color: #70717d;font-family: Merriweather, Georgia, serif;" href="http://test.com">Book now</a>
      </div>
    </div>

          </div><p>




      <br></p><div style="line-height:20px;font-size:20px;">&nbsp;</div><p>

      <br></p><div class="layout two-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #ffffff;">

          <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;Float: left;max-width: 320px;min-width: 300px; width: 320px;width: calc(12300px - 2000%);">

        <div style="font-size: 12px;font-style: normal;font-weight: normal;" align="center">
          <img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-top" style="border: 0;display: block;height: auto;width: 100%;max-width: 480px;" src="https://i1.createsend1.com/ei/d/B2/145/2C5/204455/csfinal/greece-304-888x550.jpg" alt="" width="300">
        </div>

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 20px;">
      <h3 style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #353638;font-size: 16px;line-height: 24px;"><strong><em>Greece</em></strong></h3><p style="Margin-top: 12px;Margin-bottom: 20px;">Located in the heart of the Mediterranean, our resort and spa is guaranteed to be a great home base for your next trip to Greece in any season.&nbsp;</p>
    </div>

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 24px;">
      <div class="btn btn--flat btn--large" style="text-align:left;">
        <a target="_blank" style="border-radius: 4px;display: inline-block;font-size: 14px;font-weight: bold;line-height: 24px;padding: 12px 24px;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #fff;background-color: #70717d;font-family: Merriweather, Georgia, serif;" href="http://test.com">View Hotel</a>
      </div>
    </div>

          </div>

          <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;Float: left;max-width: 320px;min-width: 300px; width: 320px;width: calc(12300px - 2000%);">

        <div style="font-size: 12px;font-style: normal;font-weight: normal;" align="center">
          <img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-top" style="border: 0;display: block;height: auto;width: 100%;max-width: 480px;" src="https://i2.createsend1.com/ei/d/B2/145/2C5/204455/csfinal/viet.jpg" alt="" width="300">
        </div>

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 20px;">
      <h3 style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #353638;font-size: 16px;line-height: 24px;"><em><strong>Vietnam</strong></em></h3><p style="Margin-top: 12px;Margin-bottom: 20px;">Our hotel in central Hanoi has the perfect blend of culture and luxury. This hotel features truly authentic dining with a 5-star restaurant onsite.&nbsp;</p>
    </div>

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 24px;">
      <div class="btn btn--flat btn--large" style="text-align:left;">
        <a target="_blank" style="border-radius: 4px;display: inline-block;font-size: 14px;font-weight: bold;line-height: 24px;padding: 12px 24px;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #fff;background-color: #70717d;font-family: Merriweather, Georgia, serif;" href="http://test.com">View Hotel</a>
      </div>
    </div>

          </div>

        </div>
      </div><p>

      <br></p><div style="line-height:20px;font-size:20px;">&nbsp;</div><p>

      <br></p><div class="layout two-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #ffffff;">

          <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;Float: left;max-width: 320px;min-width: 300px; width: 320px;width: calc(12300px - 2000%);">

        <div style="font-size: 12px;font-style: normal;font-weight: normal;" align="center">
          <img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-top" style="border: 0;display: block;height: auto;width: 100%;max-width: 480px;" src="https://i3.createsend1.com/ei/d/B2/145/2C5/204455/csfinal/sf.jpg" alt="" width="300">
        </div>

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 20px;">
      <h3 style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #353638;font-size: 16px;line-height: 24px;"><em><strong>San Fransisco</strong></em>&nbsp;</h3><p style="Margin-top: 12px;Margin-bottom: 20px;">This city has so much to offer. Our hotel here is located right on the water with amazing views and a row of bars and restaurants just next door.</p>
    </div>

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 24px;">
      <div class="btn btn--flat btn--large" style="text-align:left;">
        <a target="_blank" style="border-radius: 4px;display: inline-block;font-size: 14px;font-weight: bold;line-height: 24px;padding: 12px 24px;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #fff;background-color: #70717d;font-family: Merriweather, Georgia, serif;" href="http://test.com">View Hotel</a>
      </div>
    </div>

          </div>

          <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;Float: left;max-width: 320px;min-width: 300px; width: 320px;width: calc(12300px - 2000%);">

        <div style="font-size: 12px;font-style: normal;font-weight: normal;" align="center">
          <img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-top" style="border: 0;display: block;height: auto;width: 100%;max-width: 480px;" src="https://i4.createsend1.com/ei/d/B2/145/2C5/204455/csfinal/beach1.jpg" alt="" width="300">
        </div>

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 20px;">
      <h3 style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #353638;font-size: 16px;line-height: 24px;"><em><strong>Maldives</strong></em></h3><p style="Margin-top: 12px;Margin-bottom: 20px;">Whether you\'re on a romantic getaway or a family vacation, our Maldives location has something for everyone from spa treatments to outdoor fun.</p>
    </div>

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 24px;">
      <div class="btn btn--flat btn--large" style="text-align:left;">
        <a target="_blank" style="border-radius: 4px;display: inline-block;font-size: 14px;font-weight: bold;line-height: 24px;padding: 12px 24px;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #fff;background-color: #70717d;font-family: Merriweather, Georgia, serif;" href="http://test.com">View Hotel</a>
      </div>
    </div>

          </div>

        </div>
      </div><p>

      <br></p><div style="line-height:20px;font-size:20px;">&nbsp;</div><p>

      <br></p><div class="layout email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;">

          <div class="column wide" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;Float: left;max-width: 400px;min-width: 320px; width: 320px;width: calc(8000% - 47600px);">
            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">

              <div>

              </div>
              <div style="Margin-top: 18px;">

              </div>
            </div>
          </div>

          <div class="column narrow" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;Float: left;max-width: 320px;min-width: 200px; width: 320px;width: calc(72200px - 12000%);">
            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">

            </div>
          </div>

        </div>
      </div><p>



          <br></p><div class="column" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);">
            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
              <div>
                <span><a target="_blank" style="text-decoration: underline;transition: opacity 0.1s ease-in;color: #a3a4ad;" href="http://client.updatemyprofile.com/d-l-2AD73FFF-l-r" lang="en">Preferences</a>&nbsp;&nbsp;|&nbsp;&nbsp;</span><a target="_blank" style="text-decoration: underline;transition: opacity 0.1s ease-in;color: #a3a4ad;" href="http://preview16062310.createsend1.com/t/d-u-tkdliid-l-j/">Unsubscribe</a>
              </div>
            </div>
          </div>','created_at' => '2016-06-23 16:58:05','updated_at' => '2016-06-28 14:08:38'),
            array('id' => '3','name' => 'Product (mobile view)','template' => '<p><br></p><div class="snippet" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;width: calc(14000% - 78120px);padding: 10px 0 5px 0;color: #bbb;font-family: Merriweather,Georgia,serif;">

          </div><p>

          <br></p><div class="webversion" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;width: calc(14100% - 78680px);padding: 10px 0 5px 0;text-align: right;color: #bbb;font-family: Merriweather,Georgia,serif;">

          </div><p>




      <br></p><div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #fefefe;">

          <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: " pt="" serif",georgia,serif;max-width:="" 600px;min-width:="" 320px;="" width:="" 320px;width:="" calc(28000%="" -="" 167400px);"="">

        <div style="font-size: 12px;font-style: normal;font-weight: normal;" align="center">
          <img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-top" style="border: 0;display: block;height: auto;width: 100%;max-width: 900px;" src="https://i1.createsend1.com/ei/d/B2/145/2C5/210047/csfinal/fashion-hero1.jpg" alt="" width="600">
        </div>

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 20px;">
      <div style="line-height:10px;font-size:1px">&nbsp;</div>
    </div>

            <div style="Margin-left: 20px;Margin-right: 20px;">
      <h1 class="size-34" style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #2ecc9e;font-size: 30px;line-height: 38px;font-family: Cabin,Avenir,sans-serif;text-align: center;" lang="x-size-34">My favorite things...</h1><p class="size-16" style="Margin-top: 20px;Margin-bottom: 0;font-size: 16px;line-height: 24px;text-align: center;" lang="x-size-16">Being
 a fashionista in the big city I pick up all kinds of tips on how to
stay stylish on a budget and still keep my individuality. As the end of
the month comes to a close, I picked a few of my favorite posts to
share.&nbsp;</p><p class="size-16" style="Margin-top: 20px;Margin-bottom: 20px;font-size: 16px;line-height: 24px;text-align: center;" lang="x-size-16">❤<br>
Riya Lee</p>
    </div>

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 12px;">
      <div style="line-height:8px;font-size:1px">&nbsp;</div>
    </div>

          </div>

        </div>
      </div><p>

      <br></p><div style="line-height:20px;font-size:20px;">&nbsp;</div><p>

      <br></p><div class="layout two-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #fefefe;">

          <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: " pt="" serif",georgia,serif;float:="" left;max-width:="" 320px;min-width:="" 300px;="" width:="" 320px;width:="" calc(12300px="" -="" 2000%);"="">

        <div style="font-size: 12px;font-style: normal;font-weight: normal;" align="center">
          <img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-top gnd-corner-image-bottom" style="border: 0;display: block;height: auto;width: 100%;max-width: 480px;" src="https://i2.createsend1.com/ei/d/B2/145/2C5/210047/csfinal/05-newsletter02.png" alt="" width="300">
        </div>

          </div>

          <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: " pt="" serif",georgia,serif;float:="" left;max-width:="" 320px;min-width:="" 300px;="" width:="" 320px;width:="" calc(12300px="" -="" 2000%);"="">

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 12px;">
      <h2 class="size-22" style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #2ecc9e;font-size: 18px;line-height: 26px;font-family: Cabin,Avenir,sans-serif;" lang="x-size-22"><strong>Hats to the rescue</strong></h2><p class="size-17" style="Margin-top: 16px;Margin-bottom: 20px;font-size: 17px;line-height: 26px;" lang="x-size-17">The right hat can be your best friend when you\'re in a late for work in the morning or having a bad hair day.</p>
    </div>

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 12px;">
      <div class="btn btn--flat btn--large" style="text-align:left;">
        <a target="_blank" style="border-radius: 4px;display: inline-block;font-size: 14px;font-weight: bold;line-height: 24px;padding: 12px 24px;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #fff;background-color: #2ecc9e;font-family: \'PT Serif\', Georgia, serif;" href="http://test.com">Read more</a>
      </div>
    </div>

          </div>

        </div>
      </div><p>

      <br></p><div style="line-height:30px;font-size:30px;">&nbsp;</div><p>

      <br></p><div class="layout two-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #fefefe;">

          <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: " pt="" serif",georgia,serif;float:="" left;max-width:="" 320px;min-width:="" 300px;="" width:="" 320px;width:="" calc(12300px="" -="" 2000%);"="">

        <div style="font-size: 12px;font-style: normal;font-weight: normal;" align="center">
          <img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-top gnd-corner-image-bottom" style="border: 0;display: block;height: auto;width: 100%;max-width: 480px;" src="https://i3.createsend1.com/ei/d/B2/145/2C5/210047/csfinal/05-newsletter03.png" alt="" width="300">
        </div>

          </div>

          <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: " pt="" serif",georgia,serif;float:="" left;max-width:="" 320px;min-width:="" 300px;="" width:="" 320px;width:="" calc(12300px="" -="" 2000%);"="">

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 12px;">
      <h2 class="size-22" style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #2ecc9e;font-size: 18px;line-height: 26px;font-family: Cabin,Avenir,sans-serif;" lang="x-size-22"><strong>Fancy tech accessories</strong></h2><p class="size-17" style="Margin-top: 16px;Margin-bottom: 20px;font-size: 17px;line-height: 26px;" lang="x-size-17">I love my devices but they all look the same! Here\'s how I wrap my style on my phone and tablet.</p>
    </div>

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 12px;">
      <div class="btn btn--flat btn--large" style="text-align:left;">
        <a target="_blank" style="border-radius: 4px;display: inline-block;font-size: 14px;font-weight: bold;line-height: 24px;padding: 12px 24px;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #fff;background-color: #2ecc9e;font-family: \'PT Serif\', Georgia, serif;" href="http://test.com">Read more</a>
      </div>
    </div>

          </div>

        </div>
      </div><p>

      <br></p><div style="line-height:30px;font-size:30px;">&nbsp;</div><p>

      <br></p><div class="layout two-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #fefefe;">

          <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: " pt="" serif",georgia,serif;float:="" left;max-width:="" 320px;min-width:="" 300px;="" width:="" 320px;width:="" calc(12300px="" -="" 2000%);"="">

        <div style="font-size: 12px;font-style: normal;font-weight: normal;" align="center">
          <img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-top gnd-corner-image-bottom" style="border: 0;display: block;height: auto;width: 100%;max-width: 480px;" src="https://i4.createsend1.com/ei/d/B2/145/2C5/210047/csfinal/05-newsletter04.png" alt="" width="300">
        </div>

          </div>

          <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: " pt="" serif",georgia,serif;float:="" left;max-width:="" 320px;min-width:="" 300px;="" width:="" 320px;width:="" calc(12300px="" -="" 2000%);"="">

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 12px;">
      <h2 class="size-22" style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #2ecc9e;font-size: 18px;line-height: 26px;font-family: Cabin,Avenir,sans-serif;" lang="x-size-22"><strong>Boot for every season</strong></h2><p class="size-17" style="Margin-top: 16px;Margin-bottom: 20px;font-size: 17px;line-height: 26px;" lang="x-size-17">Check out my top tips on how to pair your favorite boots on any outfit from winter to summer.&nbsp;</p>
    </div>

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 12px;">
      <div class="btn btn--flat btn--large" style="text-align:left;">
        <a target="_blank" style="border-radius: 4px;display: inline-block;font-size: 14px;font-weight: bold;line-height: 24px;padding: 12px 24px;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #fff;background-color: #2ecc9e;font-family: \'PT Serif\', Georgia, serif;" href="http://test.com">Read more</a>
      </div>
    </div>

          </div>

        </div>
      </div><div class="layout email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;">

          <div class="column wide" style="text-align: left;font-size: 12px;line-height: 19px;color: #bbb;font-family: Merriweather,Georgia,serif;Float: left;max-width: 400px;min-width: 320px; width: 320px;width: calc(8000% - 47600px);">
            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">

              <div>

              </div>
              <div style="Margin-top: 18px;">

              </div>
            </div>
          </div>

          <div class="column narrow" style="text-align: left;font-size: 12px;line-height: 19px;color: #bbb;font-family: Merriweather,Georgia,serif;Float: left;max-width: 320px;min-width: 200px; width: 320px;width: calc(72200px - 12000%);">
            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">

            </div>
          </div>

        </div>
      </div><div class="layout one-col email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;">

          <div class="column" style="text-align: left;font-size: 12px;line-height: 19px;color: #bbb;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);">
            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
</div></div></div></div>','created_at' => '2016-06-23 17:04:06','updated_at' => '2016-06-28 14:07:23'),
            array('id' => '4','name' => 'Product (desktop view)','template' => '<p><br></p><div class="wrapper" style="min-width: 320px;background-color: #fefefe;" lang="x-wrapper">
      <div class="preheader" style="Margin: 0 auto;max-width: 560px;min-width: 280px; width: 280px;width: calc(28000% - 173040px);">
        <div style="border-collapse: collapse;display: table;width: 100%;">

          <div class="snippet" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;width: calc(14000% - 78120px);padding: 10px 0 5px 0;color: #bbb;font-family: Merriweather,Georgia,serif;">

          </div>

          <div class="webversion" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;width: calc(14100% - 78680px);padding: 10px 0 5px 0;text-align: right;color: #bbb;font-family: Merriweather,Georgia,serif;">

          </div>

        </div>
      </div>

      <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #fefefe;">

          <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: " pt="" serif",georgia,serif;max-width:="" 600px;min-width:="" 320px;="" width:="" 320px;width:="" calc(28000%="" -="" 167400px);"="">

        <div style="font-size: 12px;font-style: normal;font-weight: normal;" align="center">
          <img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-top" style="border: 0;display: block;height: auto;width: 100%;max-width: 900px;" src="https://i1.createsend1.com/ei/d/B2/145/2C5/210047/csfinal/fashion-hero1.jpg" alt="" width="600">
        </div>

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 20px;">
      <div style="line-height:10px;font-size:1px">&nbsp;</div>
    </div>

            <div style="Margin-left: 20px;Margin-right: 20px;">
      <h1 class="size-34" style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #2ecc9e;font-size: 30px;line-height: 38px;font-family: Cabin,Avenir,sans-serif;text-align: center;" lang="x-size-34">My favorite things...</h1><p class="size-16" style="Margin-top: 20px;Margin-bottom: 0;font-size: 16px;line-height: 24px;text-align: center;" lang="x-size-16">Being
 a fashionista in the big city I pick up all kinds of tips on how to
stay stylish on a budget and still keep my individuality. As the end of
the month comes to a close, I picked a few of my favorite posts to
share.&nbsp;</p><p class="size-16" style="Margin-top: 20px;Margin-bottom: 20px;font-size: 16px;line-height: 24px;text-align: center;" lang="x-size-16">❤<br>
Riya Lee</p>
    </div>

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 12px;">
      <div style="line-height:8px;font-size:1px">&nbsp;</div>
    </div>

          </div>

        </div>
      </div>

      <div style="line-height:20px;font-size:20px;">&nbsp;</div>

      <div class="layout two-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #fefefe;">

          <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: " pt="" serif",georgia,serif;float:="" left;max-width:="" 320px;min-width:="" 300px;="" width:="" 320px;width:="" calc(12300px="" -="" 2000%);"="">

        <div style="font-size: 12px;font-style: normal;font-weight: normal;" align="center">
          <img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-top gnd-corner-image-bottom" style="border: 0;display: block;height: auto;width: 100%;max-width: 480px;" src="https://i2.createsend1.com/ei/d/B2/145/2C5/210047/csfinal/05-newsletter02.png" alt="" width="300">
        </div>

          </div>

          <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: " pt="" serif",georgia,serif;float:="" left;max-width:="" 320px;min-width:="" 300px;="" width:="" 320px;width:="" calc(12300px="" -="" 2000%);"="">

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 12px;">
      <h2 class="size-22" style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #2ecc9e;font-size: 18px;line-height: 26px;font-family: Cabin,Avenir,sans-serif;" lang="x-size-22"><strong>Hats to the rescue</strong></h2><p class="size-17" style="Margin-top: 16px;Margin-bottom: 20px;font-size: 17px;line-height: 26px;" lang="x-size-17">The right hat can be your best friend when you\'re in a late for work in the morning or having a bad hair day.</p>
    </div>

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 12px;">
      <div class="btn btn--flat btn--large" style="text-align:left;">
        <a target="_blank" style="border-radius: 4px;display: inline-block;font-size: 14px;font-weight: bold;line-height: 24px;padding: 12px 24px;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #fff;background-color: #2ecc9e;font-family: \'PT Serif\', Georgia, serif;" href="http://test.com">Read more</a>
      </div>
    </div>

          </div>

        </div>
      </div>

      <div style="line-height:30px;font-size:30px;">&nbsp;</div>

      <div class="layout two-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #fefefe;">

          <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: " pt="" serif",georgia,serif;float:="" left;max-width:="" 320px;min-width:="" 300px;="" width:="" 320px;width:="" calc(12300px="" -="" 2000%);"="">

        <div style="font-size: 12px;font-style: normal;font-weight: normal;" align="center">
          <img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-top gnd-corner-image-bottom" style="border: 0;display: block;height: auto;width: 100%;max-width: 480px;" src="https://i3.createsend1.com/ei/d/B2/145/2C5/210047/csfinal/05-newsletter03.png" alt="" width="300">
        </div>

          </div>

          <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: " pt="" serif",georgia,serif;float:="" left;max-width:="" 320px;min-width:="" 300px;="" width:="" 320px;width:="" calc(12300px="" -="" 2000%);"="">

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 12px;">
      <h2 class="size-22" style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #2ecc9e;font-size: 18px;line-height: 26px;font-family: Cabin,Avenir,sans-serif;" lang="x-size-22"><strong>Fancy tech accessories</strong></h2><p class="size-17" style="Margin-top: 16px;Margin-bottom: 20px;font-size: 17px;line-height: 26px;" lang="x-size-17">I love my devices but they all look the same! Here\'s how I wrap my style on my phone and tablet.</p>
    </div>

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 12px;">
      <div class="btn btn--flat btn--large" style="text-align:left;">
        <a target="_blank" style="border-radius: 4px;display: inline-block;font-size: 14px;font-weight: bold;line-height: 24px;padding: 12px 24px;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #fff;background-color: #2ecc9e;font-family: \'PT Serif\', Georgia, serif;" href="http://test.com">Read more</a>
      </div>
    </div>

          </div>

        </div>
      </div>

      <div style="line-height:30px;font-size:30px;">&nbsp;</div>

      <div class="layout two-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <br><div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #fefefe;">

          <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: " pt="" serif",georgia,serif;float:="" left;max-width:="" 320px;min-width:="" 300px;="" width:="" 320px;width:="" calc(12300px="" -="" 2000%);"="">

        <div style="font-size: 12px;font-style: normal;font-weight: normal;" align="center">
          <img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-top gnd-corner-image-bottom" style="border: 0;display: block;height: auto;width: 100%;max-width: 480px;" src="https://i4.createsend1.com/ei/d/B2/145/2C5/210047/csfinal/05-newsletter04.png" alt="" width="300">
        </div>

          </div>

          <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: " pt="" serif",georgia,serif;float:="" left;max-width:="" 320px;min-width:="" 300px;="" width:="" 320px;width:="" calc(12300px="" -="" 2000%);"="">

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 12px;">
      <h2 class="size-22" style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #2ecc9e;font-size: 18px;line-height: 26px;font-family: Cabin,Avenir,sans-serif;" lang="x-size-22"><strong>Boot for every season</strong></h2><p class="size-17" style="Margin-top: 16px;Margin-bottom: 20px;font-size: 17px;line-height: 26px;" lang="x-size-17">Check out my top tips on how to pair your favorite boots on any outfit from winter to summer.&nbsp;</p>
    </div>

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 12px;">
      <div class="btn btn--flat btn--large" style="text-align:left;">
        <a target="_blank" style="border-radius: 4px;display: inline-block;font-size: 14px;font-weight: bold;line-height: 24px;padding: 12px 24px;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #fff;background-color: #2ecc9e;font-family: \'PT Serif\', Georgia, serif;" href="http://test.com">Read more</a>
      </div>
    </div>

          </div></div></div><div class="layout email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;">

          <div class="column wide" style="text-align: left;font-size: 12px;line-height: 19px;color: #bbb;font-family: Merriweather,Georgia,serif;Float: left;max-width: 400px;min-width: 320px; width: 320px;width: calc(8000% - 47600px);">
            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">

              <div>

              </div>
              <div style="Margin-top: 18px;">

              </div>
            </div>
          </div>

          <div class="column narrow" style="text-align: left;font-size: 12px;line-height: 19px;color: #bbb;font-family: Merriweather,Georgia,serif;Float: left;max-width: 320px;min-width: 200px; width: 320px;width: calc(72200px - 12000%);">
            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">

            </div>
          </div>

        </div>
      </div>
      <div class="layout one-col email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;">

          </div></div></div>','created_at' => '2016-06-23 17:04:36','updated_at' => '2016-06-28 14:08:04')
        ]);
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUpcomings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upcomings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('feed');
            $table->integer('status');
            $table->string('status_desc');
            $table->timestamps();
        });

        $url = array(
            "https://hipsters.tech/feed/podcast/",
            "https://jovemnerd.com.br/feed-nerdcast/",
            "http://adventurezone.libsyn.com/rss",
            "https://radiofobia.com.br/podcast/category/podcast/classics/feed/",
            "https://feed.podbean.com/mepoupenaweb/feed.xml",            
            "http://www.mundofreak.com.br/feed/podcast/",
            "https://eutavala.com.br/feed/podcast",
            "https://www.likeaboss.com.br/episodios/feed/like-a-boss/",
            "http://wtfpod.libsyn.com/rss",
            "https://www.npr.org/rss/podcast.php?id=510289",
            "http://feeds.nightvalepresents.com/sleepwithme",
            "https://www.spreaker.com/show/1652479/episodes/feed",
            "https://podcasts.files.bbci.co.uk/b00snr0w.rss",
            "http://feeds.feedburner.com/dancarlin/history?format=xml",
            "https://rss.art19.com/how-did-this-get-played",
            "http://feeds.soundcloud.com/users/soundcloud:users:159815029/sounds.rss",
            "https://halfdeaf.com.br/show/2987926/episodes/feed",
            "http://feeds.feedburner.com/TEDTalks_audio",
            "http://feeds.feedburner.com/papodegordo",
            "https://anchor.fm/s/d626e04/podcast/rss", //Dose Extra
            "https://anchor.fm/s/9789fe8/podcast/rss", //Opencast
            // "https://feeds.megaphone.fm/lore",
            // "http://feeds.feedburner.com/papricast",
            // "https://www.npr.org/rss/podcast.php?id=344098539",
            // "https://oprimorico.com.br/category/podcast/feed/", // simplexml_load_file(): SSL: Handshake timed out
            // "https://www.spreaker.com/show/3511542/episodes/feed",            
            // "https://feeds.megaphone.fm/bearbrook",
            // "http://feeds.feedburner.com/22HoursAnAmericanNightmare",
            // "http://feeds.soundcloud.com/users/soundcloud:users:184649022/sounds.rss",
            // "http://temacast.com.br/feed.xml",
            // "http://feeds.feedburner.com/Tecnocast",
            // "https://www.naosalvo.com.br/podcast/feed.xml",
            // "http://feed.thisamericanlife.org/talpodcast",
            // "https://feeds.castfire.com/abc-news-radio/the_dropout",
            // "http://feeds.feedburner.com/themothpodcast",
            // "https://decrepitos.com/podcast/feed.xml",
            // "http://feeds.thisiscriminal.com/CriminalShow",
            // "http://loopmatinal.libsyn.com/rss",
            // "http://audio.globoradio.globo.com/podcast/feed/97/mundo-corporativo",
            // "http://feeds.gimletmedia.com/crimetownshow",
            // "https://rss.art19.com/tim-ferriss-show",            
            // "https://feeds.megaphone.fm/solvable",
            // "http://www.redegeek.com.br/feed/podcast/?itunes",
            // "https://rss.art19.com/the-jordan-b-peterson-podcast",
            // "https://halfdeaf.com.br/show/2929970/episodes/feed",
            // "https://feeds.simplecast.com/rZ0cYk12",
            // "http://feeds.megaphone.fm/watergate",
            // "http://www.central3.com.br/category/podcasts/xadrez-verbal/feed/",
            // "https://www.spreaker.com/show/3258232/episodes/feed",
            // "http://feeds.feedburner.com/soundcloud/KhQN",
            // "https://cocatech.com.br/feed/podcast",
            // "https://rss.simplecast.com/podcasts/4123/rss",
            // "http://mythpodcast.libsyn.com/rss",
            // "http://feeds.feedburner.com/MdMPodcast",
            // "http://ondem.libsyn.com/rss",
            // "https://www.npr.org/rss/podcast.php?id=510307",                        
            // "https://www.npr.org/rss/podcast.php?id=510325",
            // "https://viracasacas.libsyn.com/rss",
            // "HTTP://feeds.feedburner.com/dragoesdegaragem",
            // "http://gugacast.libsyn.com/rss",
            // "http://audio.globoradio.globo.com/podcast/feed/80/academia-cbn",
            // "https://podcasts.files.bbci.co.uk/p02nq0gn.rss",
            // "http://feeds.soundcloud.com/users/soundcloud:users:27370138/sounds.rss",
            // "https://1986podcast.com.br/podcast/feed.xml",
            // "https://audioboom.com/channels/4978639.rss",
            // "http://portalcafebrasil.com.br/tools/podcast.xml",
            // "http://feeds.feedburner.com/Tecnicalidade",
            // "http://feeds.hearstartup.com/hearstartup",
            // "https://rss.art19.com/confronting-oj-simpson",
            // "http://feeds.gimletmedia.com/hearreplyall",
            // "https://rss.art19.com/factually-with-adam-conover",
            // "https://podcasts.files.bbci.co.uk/w13xttx2.rss",
            // "https://www.inglesonline.com.br/feed/podcast/?nocache",
            // "https://matandorobosgigantes.podbean.com/feed.xml",
            // "http://presidentedasemana.libsyn.com/rss",
            // "http://www.papotech.com.br/podcast/papotech.xml",
            // "https://rss.art19.com/dr-death",
            // "https://feeds.megaphone.fm/stuffyoumissedinhistoryclass",
            // "https://feeds.megaphone.fm/against-the-rules",
            // "http://canal42.tv/podcast/feed.xml", NOT FOUND 404
            // "http://feeds.feedburner.com/mamilos", //General error: 1366 Incorrect integer value: '' for column 'length'
            // "http://lpotl.libsyn.com/rss",
            // "https://www.spreaker.com/show/3216821/episodes/feed",
            // "http://thedollop.libsyn.com/rss",
            // "https://hbdia.com/mpb.xml",
            // "https://rss.art19.com/today-explained",
            // "https://naosalvo.com.br/podcast/seeufossevoce/feed.xml",
            // "https://radiofobia.com.br/podcast/category/podcast/feed/",
            // "https://devnaestrada.com.br/feed.xml",
            // "https://www.npr.org/rss/podcast.php?id=510318",
            // "https://www.npr.org/rss/podcast.php?id=510311",
            // "https://rss.art19.com/how-did-this-get-made",
            // "https://cinemacomrapadura.com.br/podcast.xml",
            // "http://feeds.podtrac.com/CpxouwI3kn0K",
            // "http://feeds.gimletmedia.com/sciencevs",
            // "http://feeds.feedburner.com/naoobstante",
            // "http://forodeteresina.libsyn.com/rss",
            // "http://feeds.feedburner.com/trocaodisco",
            // "http://feeds.wnyc.org/radiolab", //General error: 1366 Incorrect integer value: 'None' for column 'length'
            // "http://feeds.feedburner.com/freakonomicsradio",
            // "https://anchor.fm/s/beba70c/podcast/rss",            
            // "https://audioboom.com/channels/2399216.rss",
            // "https://feeds.megaphone.fm/revisionisthistory",
            // "http://www.if.ufrgs.br/~arenzon/fronteirasdaciencia.xml",
            // "https://canaltech.com.br/rss/podcast/",
            // "https://www.spreaker.com/show/3208787/episodes/feed",            
            // "https://naval.libsyn.com/rss",
            // "https://filosofiapop.com.br/feed/podcast/",
            // "https://rss.art19.com/my-favorite-murder-with-karen-kilgariff-and-georgia-hardstark-fb",
            // "https://feeds.megaphone.fm/twoprinces",
            // "https://rss.art19.com/inside-star-wars",
            // "http://audio.globoradio.globo.com/podcast/feed/319/economia",
            // "https://www.npr.org/rss/podcast.php?id=510299",
            // "http://feeds.feedburner.com/mmnoar",
            // "https://halfdeaf.com.br/show/2987933/episodes/feed",
            // "http://feeds.feedburner.com/EnglishAsASecondLanguagePodcast",
            // "http://feeds.feedburner.com/pod-save-america",
            // "http://feeds.earhustlesq.com/earhustlesq",
            // "http://feeds.feedburner.com/dancarlin/commonsense?format=xml",
            // "https://feeds.megaphone.fm/culpable",
            // "https://feeds.simplecast.com/qY8zaiXF",
            // "https://www.npr.org/rss/podcast.php?id=381444908",
            // "https://www.npr.org/rss/podcast.php?id=510313",
            // "http://feeds.feedburner.com/dashpodcast",
            // "http://feeds.feedburner.com/soundcloud/TWhV",
            // "https://podcasts.files.bbci.co.uk/p02nq0lx.rss",
            // "https://rss.art19.com/the-shrink-next-door",
            // "https://www.spreaker.com/show/3221921/episodes/feed",
            // "http://feeds.wnyc.org/moreperfect",
            // "http://feeds.feedburner.com/soundcloud/HgFV",
            // "https://feeds.megaphone.fm/darkside",
            // "http://feeds.feedburner.com/jack-animeclub",
            // "http://feeds.stownpodcast.org/stownpodcast",
            // "https://feeds.simplecast.com/AZQtlzze",
            // "https://feeds.megaphone.fm/vergecast",
            // "http://feeds.nightvalepresents.com/welcometonightvalepodcast",
            // "https://feeds.megaphone.fm/to-live-and-die-in-la",
            // "http://feeds.soundcloud.com/users/soundcloud:users:187785133/sounds.rss",
            // "http://feeds.wnyc.org/TheAnthropoceneReviewed",
            // "http://rss.acast.com/mydadwroteaporno",
            // "https://www.npr.org/rss/podcast.php?id=510333",
            // "https://feeds.megaphone.fm/stuffyoushouldknow",
            // "http://rss.art19.com/the-daily",
            // "https://halfdeaf.com.br/show/2929952/episodes/feed",
            // "http://reloading.com.br/feed/podcast/",
            // "https://feeds.megaphone.fm/thechernobylpodcast",
            // "http://feeds.soundcloud.com/users/soundcloud:users:502109829/sounds.rss",
            // "http://mbmbam.libsyn.com/rss",
            // "https://audioboom.com/channels/4940872.rss",
            // "https://feeds.buzzsprout.com/10363.rss",
            // "http://feeds.feedburner.com/canalmasculino",
            // "http://feeds.feedburner.com/inglestodososdias",
            // "http://feeds.soundcloud.com/users/soundcloud:users:129291755/sounds.rss",
            // "http://feeds.99percentinvisible.org/99percentinvisible",
            // "http://www.deviante.com.br/podcasts/scicast/feed/",
            // "https://feeds.megaphone.fm/nicetry",
            // "https://rss.art19.com/science-rules-with-bill-nye",
            // "https://gvcast.podbean.com/feed.xml",
            // "https://www.npr.org/rss/podcast.php?id=510308",
            // "https://feeds.megaphone.fm/blackout-podcast",
            // "http://feeds.serialpodcast.org/serialpodcast",
            // "https://anchor.fm/s/6cfe134/podcast/rss",
            // "http://audio.globoradio.globo.com/podcast/feed/87/cbn-dinheiro",
            // "https://feeds.megaphone.fm/SLT7210881615",
            // "https://podcastnbw.com/?feed=podcast",
            // "http://daveramsey.ramsey.libsynpro.com/rss",
            // "http://www.spreaker.com/show/2885428/episodes/feed",
            // "http://peladananet.com.br/category/pelada_na_net_podcast/feed/",
            // "http://feeds.soundcloud.com/users/soundcloud:users:24205710/sounds.rss",
            // "https://feeds.megaphone.fm/darknetdiaries",
            // "http://feed.portalcafebrasil.com.br/tools/lidercast.xml",
            // "https://www.npr.org/rss/podcast.php?id=510343",
            // "https://www.npr.org/rss/podcast.php?id=510310",
            // "https://areadetransferencia.com.br/rss",
            // "http://feeds.soundcloud.com/users/soundcloud:users:17175875/sounds.rss",
            // "https://rss.art19.com/art-of-manliness",
            // "http://billburr.libsyn.com/rss",
            // "http://feeds.feedburner.com/this-land",
            // "http://joeroganexp.joerogan.libsynpro.com/rss",
            // "http://feed.songexploder.net/songexploder",
            // "http://feeds.soundcloud.com/users/soundcloud:users:38128127/sounds.rss",
            // "http://www.central3.com.br/category/podcasts/fronteiras-invisiveis-do-futebol/feed/podcast/",
            // "https://rss.art19.com/conan-obrien",
            // "https://rss.art19.com/best-friends-with-nicole-byer-and-sasheer-zamata",
            // "http://wakingup.libsyn.com/rss",
            // "https://feeds.simplecast.com/my4SVuRM",
            // "https://feeds.publicradio.org/public_feeds/in-the-dark/itunes/rss",
            // "http://99vidas.com.br/99vidas.xml",
            // "https://rss.art19.com/man-in-the-window",
            // "https://feeds.megaphone.fm/HSW7933892085",
            // "https://feeds.megaphone.fm/TPG6314295157",
            // "http://feeds.feedburner.com/BrPortuguesePodcastBusiness",
            // "http://feeds.feedburner.com/takeawaypodcast",
            // "http://podcrastinadores.com.br/feed/podcast",
            // "http://feeds.feedburner.com/naruhodopodcast",
            // "https://www.npr.org/rss/podcast.php?id=510298",
            // "http://feeds.feedburner.com/PautaLivreNewsPodcast",
            // "https://rss.art19.com/dirty-john"
        );

        foreach ($url as $feed) {
            // Insert Feed Url
            DB::table('upcomings')->insert(
                array(
                    'feed' => $feed,
                    'status' => 0,
                    'status_desc' => 'not added'
                )
            );
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upcomings');
    }
}

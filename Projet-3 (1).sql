-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  Dim 02 sep. 2018 à 12:32
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Projet-3`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `validated` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `pseudo`, `email`, `comment`, `comment_date`, `validated`) VALUES
(109, 1, 'Noémie', 'n.coplo@gmail.com', 'un commentaire pour tester le signalement', '2018-07-29 00:00:00', 0),
(112, 4, 'ana', 'n.coplo@gmail.com', 'Super chapitre vivement la suite...', '2018-08-01 00:00:00', 1),
(116, 3, 'test', 'test@test.com', 'test', '2018-08-22 00:00:00', 1),
(121, 6, 'ana', 'ana@gmail.com', 'super chapitre !', '2018-08-24 00:00:00', 1),
(123, 7, 'no', 'n.coplo@gmail.com', 'j\'adore !!', '2018-08-29 16:59:46', 1);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name_img` varchar(255) NOT NULL,
  `url_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(10) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `pseudo` varchar(32) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `date_inscription` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `role`, `pseudo`, `pass`, `email`, `date_inscription`) VALUES
(29, 'admin', 'admin', '$2y$10$Mbl6Z4P48PeOcWd5oAsa9.wuh9TUG8wsWSrUw/vSGin7C7lM8JiDO', 'weirdrummer@gmail.com', '2018-08-03 00:00:00'),
(34, 'user', 'ana', '$2y$10$XVeObdpflWEvKfzJYmLVku7FeK/tjVBB6oRxxLFhM6.XKMqaw7xf2', 'ana@gmail.com', '2018-08-24 00:00:00'),
(35, 'user', 'user', '$2y$10$uGu.PTchoDPeQ.U9QqkQZuXEKmJot8J4fdGy/mKLconBhgJkXfWTa', 'user@gmail.com', '2018-08-31 15:44:57');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `name`, `title`, `content`, `img`, `created_at`) VALUES
(1, 'Jean Forteroche', 'Episode 1 : Appât sanglant ', '« 6 avril, 14 h 56 Chaîne de Brooks, Alaska <br /><br />Toujours respecter Mère Nature… surtout quand elle pèse deux cents kilos et surveille sa progéniture. À cinquante mètres de distance, Matthew Pike et la femelle grizzly s’observaient d’un air méfiant. <br />     L’ourson fourrageait dans un buisson de ronces mais, comme la saison des mûres n’avait pas débuté, il se contentait de tripoter les branches sans s’inquiéter du garde forestier d’un mètre quatre-vingt-huit qui transpirait devant lui en plein soleil. En fait, il n’avait pas grand-chose à craindre : forte de sa musculature puissante, de ses crocs jaunes et de ses grosses griffes, sa mère lui assurait une protection à toute épreuve. Matt serrait son spray au poivre dans sa paume moite. Son autre main s’approcha lentement du fusil qu’il portait en bandoulière. <br /><br />     Ne charge pas, ma belle… Ne me rends pas la journée plus pénible qu’elle ne l’est déjà. Quelques heures auparavant, il avait eu des soucis avec ses chiens et avait dû les laisser au camp. Les oreilles plaquées sur le crâne, l’ourse resserra l’arrière-train et piétina sur les pattes avant. Le message était clair : en cas de menace, elle n’hésiterait pas à attaquer. <br /><br />     « Matt réprima un grognement. Il aurait voulu déguerpir, mais il savait qu’elle le courserait aussitôt. Il recula donc d’un pas sans faire craquer de brindille. C’était son ex-femme, initiée par son père inuit, qui lui avait cousu ses bottes en peau d’orignal et, même s’ils étaient divorcés depuis trois ans, Matt apprécia son talent, car les semelles souples lui permettaient de marcher en silence. Il continua de battre discrètement en retraite. D’ordinaire, le meilleur moyen de sauver sa peau face à un ours était de faire du tapage : cris, sifflets, vociférations, n’importe quoi du moment que cela rebutait le prédateur solitaire. En revanche, lorsqu’on tombait sur une mère et son petit, le moindre bruit ou geste brusque risquait d’inciter celle-ci à donner l’assaut. Chaque année, les attaques d’Ursus arctos horribilis se comptaient par milliers en Alaska et causaient des centaines de morts. Deux mois plus tôt, Matt et un collègue avaient fouillé un affluent du Yukon à la recherche de deux rafteurs portés disparus et, hélas, ils avaient retrouvé leurs corps à moitié dévorés. L’homme connaissait donc bien les ours. En randonnée, il repérait les traces récentes de leur passage : excréments frais, mottes d’herbe retournées, troncs lacérés[…] » Extrait de: Rollins, James. »<br /><br />« [A vérifier] Mission Iceberg. » iBooks.', 'loup.jpg', '2018-06-27 10:25:43'),
(2, 'Jean Forteroche', 'Episode 2 : Le Chat et la Souris. ', '« 6 avril, 17 h 36 ZIC de la calotte glaciaire Station dérivante Oméga <br /><br />Arriverai-je un jour à me réchauffer… ? <br /><br />Le commandant Perry traversait la banquise. Le hurlement lugubre de la brise faisait écho au vide de son cœur. Aux confins du monde, le vent était une créature vivante qui soufflait en permanence et rongeait le paysage, telle une bête affamée. Le prédateur dans toute sa splendeur : impitoyable, tenace et impossible à éviter. <br /><br />     « Ce n’est pas le froid qui tue, c’est le vent », disait un vieux proverbe inuit. Perry s’enfonçait d’un pas régulier entre les mâchoires de la tempête. Derrière lui, la Sentinelle polaire flottait dans une polynie, vaste étendue d’eau piégée au milieu de la banquise. La station dérivante Oméga avait été construite sur sa berge pour permettre aux sous-marins militaires d’y accéder facilement. Le lac devait sa stabilité à une grosse couronne de crêtes de pression. D’une hauteur de deux étages et d’une profondeur quatre fois supérieure, les remparts de glace le protégeaient contre la poussée constante de la banquise, et il fallait marcher quatre cents mètres par un froid intense pour atteindre les bâtiments érigés sur un semblant de plaine. » « Perry dirigeait la première équipe autorisée à accoster. <br /><br />     Tandis que les marins bavardaient entre eux, il resta calfeutré dans sa parka militaire, le visage encadré par une capuche bordée de fourrure. Il contempla le Nord-Est, là où la base russe avait été découverte deux mois plus tôt, à même pas cinquante kilomètres de là. Un frisson lui parcourut l’échine, mais cela n’avait rien à voir avec la température glaciale. Tant de morts… Il revit les cadavres, anciens locataires de la station, entassés comme du bois de chauffage après avoir été découpés ou dégelés de leur sépulture arctique. Trente-deux hommes, douze femmes. Il avait fallu quinze jours pour évacuer tout le monde. Certains semblaient morts de faim, d’autres avaient connu une fin plus violente. Dans une cabine, on avait retrouvé une victime pendue au bout d’une corde si gelée qu’elle s’était effritée sous leurs doigts. Et ce n’était pas le pire… Perry chassa la triste pensée de son esprit. Alors qu’il gravissait une butte en s’aidant de marches taillées à même la banquise, la station dérivante apparut. Le hameau de quinze cabanes Jamesway rouge vif faisait penser à une traînée de sang sur la neige immaculée. La fumée[…] » Extrait de: Rollins, James. <br />« [A vérifier] Mission Iceberg. » iBooks.', 'ours.jpg', '2018-07-04 14:04:11'),
(3, 'Jean Forteroche', 'Episode 3 : Lignes de piégeade', '« 8 avril, 10 h 02 Parc national des Portes de l’Arctique <br /><br />     Jennifer Aratuk se tenait au-dessus du piège, matraque au poing. Le carcajou siffla, la fixa d’un air méchant et, l’arrière-train relevé, il protégea jalousement sa prise : une martre, prisonnière du collet posé par le père de la jeune femme. Son pelage noir se détachait sur la neige. Elle était morte et enfouie sous une bonne couche de poudreuse, la nuque brisée, mais c’était le carcajou qui l’avait découverte en premier, déterrée et il refusait d’abandonner son trophée congelé. Jennifer agita son gourdin en bois d’aulne. <br /><br />     — Fiche le camp d’ici ! Le mâle au masque blanc poussa un grondement féroce et lui lança un coup de patte, ce qui, en langage animal, était l’équivalent d’un « Va te faire foutre ». Quand il était question de nourriture, les carcajous avaient la réputation d’être assez intrépides pour affronter des loups. Ils possédaient aussi des griffes acérées et de puissantes mâchoires hérissées de crocs pointus. Contrariée mais prudente, Jenny songea à l’assommer. Un coup de bâton sur le crâne le ferait fuir ou l’étourdirait le  « temps qu’elle récupère la martre. Son père troquait ses fourrures contre de l’huile de phoque ou d’autres marchandises locales. Elle venait de passer quarante-huit heures à écumer sa zone d’action, autrement dit à relever les pièges, ramasser les prises et poser de nouveaux appâts. Sa corvée ne l’emballait guère, mais son père souffrait d’arthrite sévère, et elle n’aimait pas le voir s’aventurer seul en forêt. <br />     <br />     — D’accord, petit. Je suppose que tu es arrivé ici le premier. Elle détacha la corde pendue au peuplier de Virginie et, une fois la martre libérée de son piège, elle lui donna un petit coup. Le carcajou grogna, planta ses crocs dans une cuisse gelée de la bête, puis rebroussa chemin avec son butin et regagna son repaire enfoui sous la neige. Jenny le regarda se dandiner. Elle ne raconterait pas à son père qu’elle avait laissé filer l’occasion de rapporter une martre et une peau de carcajou. Il n’aurait pas apprécié. Enfin, bon, elle était shérif du comté, pas trappeuse. Il devait déjà s’estimer heureux qu’elle consacre la moitié de ses quinze jours de congés annuels à relever ses maudits pièges. Le pas alourdi par ses raquettes de sherpa, elle rejoignit son[…] » <br /><br />Extrait de: Rollins, James. « [A vérifier] Mission Iceberg. » iBooks.', 'aurore.jpg', '2018-07-05 08:32:09'),
(6, 'Jean Forteroche', 'Episode 4 : la voie des airs', '« 8 avril, 14 h 42 Au-dessus de la chaîne de Brooks <br /><br />Jennifer Aratuk vérifia sa vitesse propre, son cap et essaya d’oublier le Cessna qui virait vers elle en plein ciel. Pas évident avec Matt qui, le nez presque collé au pare-brise, hurlait : <br /><br />     — Ils arrivent ! Sans blague. Elle fit basculer son avion sur la pointe d’une aile, amorça un grand virage et aperçut sa maison en contrebas. Le cellier dévasté fumait encore, et les chiens, surexcités, aboyaient sans bruit. Son cœur se serra. Tant qu’elle ne serait pas de retour ou n’aurait pas envoyé quelqu’un s’occuper d’eux, ses amis à quatre pattes devraient se débrouiller seuls. Pour l’instant, la priorité était néanmoins de survivre. Alors qu’il rasait les cimes enneigées, son hydravion sembla traverser une averse de grêle. Un crépitement métallique fit vibrer la cabine. Bane se mit à aboyer. <br /><br />— Ils nous tirent dessus ! s’exclama Craig. L’aile droite était criblée de plombs. Merde ! Jenny tira violemment sur les manettes, ce qui remonta le nez de l’appareil et leur permit de reprendre un maximum d’altitude. Matt agrippa ses accoudoirs pour ne pas glisser du siège. — Attache-toi, grogna Jenny. Le temps de boucler sa ceinture, il guetta le« retour du Cessna : l’ennemi s’était lancé à leurs trousses. <br /><br />— Accrochez-vous ! prévint-elle au moment de survoler le point culminant de la vallée. Elle ne pouvait pas laisser l’autre avion reprendre l’ascendant mais, comme son Twin Otter était moins rapide qu’un Cessna, elle était condamnée à l’exploit. Elle rabattit les volets, poussa sur le manche et replongea vers la vallée voisine. Avec ses flancs abrupts, l’endroit ressemblait davantage à une gorge. L’avion dégringola à une vitesse vertigineuse, et Jenny se servit de la gravité pour accélérer encore. Le Twin Otter fondit en piqué vers la grosse rivière qui divisait le canyon en deux. Derrière elle, le Cessna décrivit un arc de cercle très haut dans le ciel pour tenter à nouveau de dépasser sa proie. <br /><br />     Jenny prit un virage serré et suivit le cours d’eau qui serpentait au fond de la gorge. <br /><br />— Allez, mon grand, murmura-t-elle à son avion. L’Otter, qu’elle pilotait depuis sa nomination au poste de shérif, l’avait déjà tirée de nombreux pétrins. — Ils recommencent à nous foncer dessus ! — Je t’entends, Matt. <br /><br />— Tant mieux. L’appareil survola la rivière et son enchaînement de rapides. Tout juste… Une brume épaisse flottait au-dessus de l’eau et occultait la vue. <br /><br />— Jen… ? balbutia Matt. <br /><br />— Je sais. <br /><br />      Elle fit redescendre son avion. Les flotteurs frôlaient désormais à un mètre les rochers couverts d’écume. Un grondement résonna à l’intérieur de l’habitacle. Soudain, on entendit un étrange bruit de pétards. Une rafale de plombs balaya la berge escarpée et s’écrasa dans l’eau : le Cessna volait au-dessus de leurs têtes, juste derrière eux. — Une mitrailleuse, marmonna Matt. Une balle ricocha sur un caillou et frappa une vitre latérale, qui s’étoila aussitôt. Haletant, Craig se ratatina sur son siège. Jenny grinça des dents. Il était trop tard pour changer de cap. Les parois de la gorge s’étaient transformées en falaises et se resserraient de chaque côté comme les mâchoires d’un étau. D’autres plombs atteignirent l’aile, ce qui déstabilisa l’avion. Jenny s’efforça de reprendre le contrôle. Le flotteur fixé sous la plaque de métal abîmée heurta l’eau, puis rebondit. Un seul projectile tinta à travers la cabine. « Après quoi, ils s’enfoncèrent dans un brouillard opaque. Jenny laissa échapper un soupir. Le monde disparut autour d’eux, et un puissant rugissement couvrit le bruit des moteurs. Le pare-brise se couvrit de gouttelettes. Elle ne s’embarrassa pas des essuie-glaces. De toute façon, elle était provisoirement aveugle. Elle poussa les manettes vers l’avant, ce qui entraîna l’avion dans une descente à vous retourner l’estomac. Persuadé qu’ils allaient s’écraser, Craig lâcha un cri. Il n’aurait pas dû s’inquiéter. Lorsqu’ils plongèrent presque à la verticale, leur vitesse propre remonta en flèche et ils longèrent une cascade de soixante mètres de haut. Les nuages se dissipèrent et le sol se rapprocha à vitesse grand V. Jenny remit l’avion sur une aile et bifurqua à droite en s’orientant par rapport à la falaise de gauche. » Extrait de: Rollins, James. <br /><br />« [A vérifier] Mission Iceberg. » iBooks. »', 'lac.jpg', '2018-07-17 10:05:26'),
(7, 'Jean Forteroche', 'Episode 5 : Pente Glissante', '<p>« 8 avril, 21 h 55 Au-dessus du versant nord, Alaska <br />Matt s’avachit sur son siège. Un ronflement résonnait dans la cabine du Twin Otter. Il ne venait ni du journaliste endormi ni de John, à moitié assoupi, mais du chien-loup vautré, les quatre fers en l’air, sur la troisième rangée de fauteuils. Le vacarme réussit à dérider son maître. <br /><br />— Je croyais que tu devais lui faire redresser la cloison nasale, lâcha Jenny. <br /><br />     Le rictus de Matt se transforma en franc sourire. Déjà chiot, Bane ronflait bruyamment au pied du lit, et le couple s’en était toujours amusé. Le jeune homme se redressa. <br /><br />— Le chirurgien esthétique de Nome a renoncé devant l’ampleur de la tâche. Il fallait trop raboter. Le pauvre toutou aurait ressemblé à un bouledogue. <br /><br />     Face au silence de Jenny, Matt osa un regard furtif : elle fixait le ciel droit devant elle, mais il remarqua les petites rides au coin de ses yeux. Un amusement teinté de tristesse. Les bras croisés, il se demanda s’il pouvait s’y prendre mieux avec elle. Pour l’instant, il s’en contenterait. Sous la lune presque pleine, les étendues enneigées se paraient de reflets d’argent. À une latitude aussi septentrio nale, l’hiver n’avait pas dit son dernier mot, mais quelques détails annonçaient le redoux du printemps : un filet d’eau embrumé, quelques rares lacs dégelés. De-ci de-là dans la toundra, des troupeaux épars de caribous profitaient de la nuit pour longer lentement les ruisseaux de neige fondue. Ils se nourrissaient de lichen des rennes, de grappes d’airelles et mâchonnaient de grosses balles d’herbe enracinées dans la tourbière boueuse. <br /><br />— On a eu du bol de joindre Deadhorse tout à l’heure. <br /><br />— Comment ça, Jen ? Sortis des pics Arrigetch, ils avaient réussi à contacter l’aéroport de Prudhoe Bay pour informer les autorités civiles et militaires de leur course-poursuite à travers la chaîne de Brooks. Le lendemain matin, des hélicoptères partiraient à la recherche de l’épave du Cessna, ce qui permettrait d’identifier rapidement leurs ennemis. <br /><br />     Matt avait aussi appelé Carol Jeffries, spécialiste des ours à Bettles. Elle connaissait le chalet de Jenny et enverrait des gens s’y occuper des animaux « De son côté, Craig s’était entretenu avec son propre contact à Prudhoe. Dès qu’il aurait répondu aux questions et livré son témoignage, il aurait une sacrée histoire à raconter. Une fois le monde extérieur au courant des péripéties de la journée, tous les occupants de l’avion s’étaient alors détendus. Qu’est-ce qui cloche maintenant ? Matt se redressa. Jenny ne lui montra pas la toundra mais le ciel dégagé. Il se pencha. Au début, rien d’anormal. La constellation d’Orion brillait de mille feux. Polaris, l’étoile polaire, scintillait droit devant. Soudain, il vit des serpentins verts, rouges et bleus trembloter à l’horizon. Une aurore boréale s’annonçait. <br /><br />— D’après la météo, il faut s’attendre à du beau spectacle, précisa Jenny. » <br /><br />Extrait de: Rollins, James. « [A vérifier] Mission Iceberg. » iBooks. »</p>', 'chien.jpg', '2018-07-24 15:30:12'),
(21, 'Jean Forteroche', 'Episode 6 : Pris dans les glaces', '<p>« 9 avril, 5 h 43  Au-dessus de la calotte glaciaire<br /> Depuis son siège de copilote, Matt regarda le soleil grimper sur le toit du monde. La banquise, qui étincelait d’une lumière aveuglante, lui brûlait la rétine. Alors que Jenny portait des lunettes d’aviateur, il admirait à l’œil nu la beauté d’une aurore au pôle Nord. Sous de telles latitudes, le phénomène se produisait rarement, puis le globe glacé restait fiché dans le ciel quatre mois d’affilée. On apprenait donc à apprécier chaque lever et chaque coucher de soleil.</p>\r\n<p>Ce matin-là, le spectacle était particulièrement féerique. Un vent contraire de sud-est avait dissipé l’éternel banc de brume flottant au-dessus de la calotte. En contrebas s’étalait un vaste monde immaculé de glaces blanches crénelées, de pics cristallins escarpés et d’étangs bleu ciel.</p>\r\n<p>À l’horizon, un flot rosé de lumière s’étendait jusqu’au sillage de l’avion. Des traînées orangées et rouge foncé zébraient l’azur alaskain.</p>\r\n<p>— Il va y avoir de la tempête, grommela-t-on à l’arrière.</p>\r\n<p>Le père de Jenny s’était réveillé de sa sieste.</p>\r\n<p>Matt se retourna.</p>\r\n<p>— Qu’est-ce qui vous le fait dire ?</p>\r\n<p>« Craig ronchonna, à moitié assoupi sur son siège : il ne s’intéressait guère aux prévisions météorologiques. Derrière lui, Bane leva le museau et bâilla à s’en décrocher la mâchoire. Le chien-loup semblait aussi contrarié que le journaliste d’avoir été tiré de son sommeil.</p>\r\n<p>Sans y prêter attention, John montra le ciel au nord. Le crépuscule s’y accrochait toujours. Des volutes de fumée tourbillonnaient et écumaient près de la ligne d’horizon.</p>\r\n<p>— C’est du brouillard givrant, annonça le vieil Inuit. La température dégringole même quand le soleil se lève.</p>\r\n<p>— Le temps est en train de changer, acquiesça Matt.</p>\r\n<p>En Alaska, les tempêtes étaient rarement anodines. Soit le ciel était clair et calme, comme ce jour-là, soit le blizzard balayait tout sur son passage. Certes, autour du cercle polaire, les chutes de neige ne voulaient pas dire grand-chose, mais les vents, très dangereux, soulevaient des bancs de glace et de poudreuse qui bloquaient toute visibilité.</p>\r\n<p>— On arrivera à la station dérivante avant que ça ne craque ?</p>\r\n<p>« — Sans doute, répondit Jenny.</p>\r\n<p>C’étaient les premiers mots qu’elle prononçait depuis leur départ de Kaktovik. Quelque chose l’avait bouleversée chez Bennie, mais elle avait refusé d’en parler. Elle avait avalé son dîner aussi machinalement qu’une tractopelle aurait attaqué une butte de terre compacte. Après quoi, elle s’était accordé une courte sieste dans le bureau du hangar – une demi-heure maximum – et, quand elle était ressortie de sa tanière, elle avait les yeux rouges, signe qu’elle n’avait pas dû dormir du tout.</p>\r\n<p>John Aratuk croisa quelques secondes le regard de Matt. Quand Jenny était mariée, les deux hommes étaient copains comme cochons : ils adoraient camper, chasser ou pêcher </p>\r\n<p>« ensemble. Depuis le drame, leur relation s’était considérablement refroidie.</p>\r\n<p>Pourtant, à la mort de Tyler, Matt n’avait ressenti aucune récrimination de la part de son beau-père. John connaissait mieux que personne la cruauté de la vie rurale en Alaska : à tout instant, on risquait d’y laisser la vie. Il avait grandi dans un hameau côtier du golfe de Kotzebue, près du détroit de Béring. Son prénom inuit était Junaquaat, qu’il avait raccourci en John au moment de s’installer dans l’arrière-pays. Victime de la famine durant les terribles gelées de 1975, son village avait été rayé de la carte en un seul hiver. L’homme avait perdu toute sa famille – et son malheur n’était pas exceptionnel. Dans le Grand Nord, les provisions étaient rares. La survie ne tenait souvent qu’à un fil. <br /><br /></p>\r\n<p>« Même s’il ne blâmait pas son ex-gendre de la noyade de Tyler, John lui reprochait les mois atroces qui avaient suivi. Matt n’avait pas été tendre avec sa fille. Miné par la souffrance et la culpabilité, il avait sombré dans l’alcool et exclu Jenny de son existence, tant il avait du mal à affronter son regard accusateur. À l’époque, ils s’étaient assené des paroles irréversibles et, finalement, la coupe avait été pleine. Brisés, accablés, le cœur en miettes, ils avaient fait une croix sur leur couple et s’étaient séparés.</p>\r\n<p>John pressa l’épaule de Matt en signe d’acceptation et de paix. Le peuple inuit apprenait à survivre à la mort mais aussi au chagrin. »</p>\r\n<p>Extrait de: Rollins, James. « [A vérifier] Mission Iceberg. » iBooks. »</p>', 'action-adult-animal-1175135.jpg', '2018-08-31 11:57:50'),
(22, 'Jean Forteroche', 'Episode 7 :  Action Discrète', '<p>« 9 avril, 8 h 38, <br />À bord du Drakon<br />Viktor Petkov devinait l’impatience du jeune commandant. Voilà une heure qu’ils n’avaient pas bougé d’un pouce, moteurs éteints, à deux mètres de profondeur. Un mètre à peine de la banquise ! Ils avaient déniché un couloir dans la calotte polaire, trop étroit pour refaire surface, mais la brèche leur avait permis de déployer leur antenne radio à l’air libre.</p>\r\n<p>Comme prévu, ils attendaient le feu vert du colonel-général Chenko au FSB, mais les transmissions par rafales de Lubyanka avaient pris du retard. Même Viktor, sur des charbons ardents, consulta encore sa montre.</p>\r\n<p>— Je ne comprends pas, souffla Mikovsky. Nous sommes censés débarquer à la station de recherche américaine dans quarante-huit heures. Qu’est-ce qu’on attend ? Une nouvelle manœuvre ? Histoire d’installer d’autres balises météorologiques ? ironisa-t-il.</p>\r\n<p>Le commandant croyait encore que le dispositif Polaris était un simple moyen d’espionner les Américains.</p>\r\n<p>Soit.</p>\r\n<p>Sur le pont, les marins étaient à cran. Ils avaient appris l’attaque de la veille sur la station pétrolière en Alaska. </p>\r\n<p>      Personne ne savait de quoi il retournait, mais ils avaient tous conscience que les forces américaines déployées sur place seraient en état d’alerte maximale. Les eaux de la région étaient devenues beaucoup plus chaudes, même pour une banale mission diplomatique.</p>\r\n<p>Viktor vérifia le lourd moniteur Polaris qu’il portait autour de son autre poignet. L’écran plasma affichait toujours l’étoile à cinq branches. Chaque point luisait dans l’attente de la détonation maîtresse.</p>\r\n<p>Tout allait bien.</p>\r\n<p>Cette nuit-là, les tests diagnostiques de Polaris s’étaient déroulés sans encombre et n’avaient nécessité qu’un léger recalibrage. Doté d’une technologie sonique dernier cri, l’engin nucléaire était capable de fracasser la banquise tout entière mais, en mode silencieux, il servait aussi de récepteur sensible. Les cinq extrémités de l’étoile constituaient un radar, une énorme parabole glacée de cinquante kilomètres de rayon. À l’image des systèmes EBF embarqués à bord des submersibles, Viktor pouvait se trouver n’importe où sur la planète, son moniteur réussirait toujours à communiquer avec le dispositif. « Dans un coin de l’écran, le minuscule cœur rouge clignotait au rythme de ses propres pulsations.</p>\r\n<p>Soudain, l’officier de pont jaillit du cagibi radio.</p>\r\n<p>— Un message pour l’amiral Petkov !</p>\r\n<p>Il remit son bloc-notes au commandant Mikovsky, qui le transmit à l’intéressé.</p>\r\n<p>Le vieux Russe s’éloigna de quelques pas et, au fil de sa lecture, esquissa un sourire glacé.</p>\r\n<p> »</p>\r\n<p>Extrait de: Rollins, James. « [A vérifier] Mission Iceberg. iBooks.</p>', 'clouds-daylight-hd-wallpaper-448714.jpg', '2018-09-02 14:01:15');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  ven. 06 juil. 2018 à 09:00
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
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `name`, `title`, `content`, `created_at`) VALUES
(1, 'Jean Forteroche', 'Chapitre Un : \"Appât Sanglant\"', '« 6 avril, 14 h 56\r\nChaîne de Brooks, Alaska\r\nToujours respecter Mère Nature… surtout quand elle pèse deux cents kilos et surveille sa progéniture.\r\nÀ cinquante mètres de distance, Matthew Pike et la femelle grizzly s’observaient d’un air méfiant. L’ourson fourrageait dans un buisson de ronces mais, comme la saison des mûres n’avait pas débuté, il se contentait de tripoter les branches sans s’inquiéter du garde forestier d’un mètre quatre-vingt-huit qui transpirait devant lui en plein soleil. En fait, il n’avait pas grand-chose à craindre : forte de sa musculature puissante, de ses crocs jaunes et de ses grosses griffes, sa mère lui assurait une protection à toute épreuve.\r\nMatt serrait son spray au poivre dans sa paume moite. Son autre main s’approcha lentement du fusil qu’il portait en bandoulière. Ne charge pas, ma belle… Ne me rends pas la journée plus pénible qu’elle ne l’est déjà. Quelques heures auparavant, il avait eu des soucis avec ses chiens et avait dû les laisser au camp.\r\nLes oreilles plaquées sur le crâne, l’ourse resserra l’arrière-train et piétina sur les pattes avant. Le message était clair : en cas de menace, elle n’hésiterait pas à attaquer. « Matt réprima un grognement. Il aurait voulu déguerpir, mais il savait qu’elle le courserait aussitôt. Il recula donc d’un pas sans faire craquer de brindille. C’était son ex-femme, initiée par son père inuit, qui lui avait cousu ses bottes en peau d’orignal et, même s’ils étaient divorcés depuis trois ans, Matt apprécia son talent, car les semelles souples lui permettaient de marcher en silence.\r\nIl continua de battre discrètement en retraite.\r\nD’ordinaire, le meilleur moyen de sauver sa peau face à un ours était de faire du tapage : cris, sifflets, vociférations, n’importe quoi du moment que cela rebutait le prédateur solitaire. En revanche, lorsqu’on tombait sur une mère et son petit, le moindre bruit ou geste brusque risquait d’inciter celle-ci à donner l’assaut. Chaque année, les attaques d’Ursus arctos horribilis se comptaient par milliers en Alaska et causaient des centaines de morts. Deux mois plus tôt, Matt et un collègue avaient fouillé un affluent du Yukon à la recherche de deux rafteurs portés disparus et, hélas, ils avaient retrouvé leurs corps à moitié dévorés.\r\nL’homme connaissait donc bien les ours. En randonnée, il repérait les traces récentes de leur passage : excréments frais, mottes d’herbe retournées, troncs lacérés[…] »\r\n\r\nExtrait de: Rollins, James. « [A vérifier] Mission Iceberg. » iBooks. \r\n\r\n', '2018-06-27'),
(2, 'Jean Forteroche', 'Chapitre 2 : \" Le chat et la souris\"', '« 6 avril, 17 h 36\r\nZIC de la calotte glaciaire\r\nStation dérivante Oméga\r\nArriverai-je un jour à me réchauffer… ?\r\nLe commandant Perry traversait la banquise. Le hurlement lugubre de la brise faisait écho au vide de son cœur. Aux confins du monde, le vent était une créature vivante qui soufflait en permanence et rongeait le paysage, telle une bête affamée. Le prédateur dans toute sa splendeur : impitoyable, tenace et impossible à éviter. « Ce n’est pas le froid qui tue, c’est le vent », disait un vieux proverbe inuit.\r\nPerry s’enfonçait d’un pas régulier entre les mâchoires de la tempête. Derrière lui, la Sentinelle polaire flottait dans une polynie, vaste étendue d’eau piégée au milieu de la banquise. La station dérivante Oméga avait été construite sur sa berge pour permettre aux sous-marins militaires d’y accéder facilement. Le lac devait sa stabilité à une grosse couronne de crêtes de pression. D’une hauteur de deux étages et d’une profondeur quatre fois supérieure, les remparts de glace le protégeaient contre la poussée constante de la banquise, et il fallait marcher quatre cents mètres par un froid intense pour atteindre les bâtiments érigés sur un semblant de plaine. « Perry dirigeait la première équipe autorisée à accoster. Tandis que les marins bavardaient entre eux, il resta calfeutré dans sa parka militaire, le visage encadré par une capuche bordée de fourrure. Il contempla le Nord-Est, là où la base russe avait été découverte deux mois plus tôt, à même pas cinquante kilomètres de là. Un frisson lui parcourut l’échine, mais cela n’avait rien à voir avec la température glaciale.\r\nTant de morts… Il revit les cadavres, anciens locataires de la station, entassés comme du bois de chauffage après avoir été découpés ou dégelés de leur sépulture arctique. Trente-deux hommes, douze femmes. Il avait fallu quinze jours pour évacuer tout le monde. Certains semblaient morts de faim, d’autres avaient connu une fin plus violente. Dans une cabine, on avait retrouvé une victime pendue au bout d’une corde si gelée qu’elle s’était effritée sous leurs doigts. Et ce n’était pas le pire…\r\nPerry chassa la triste pensée de son esprit.\r\nAlors qu’il gravissait une butte en s’aidant de marches taillées à même la banquise, la station dérivante apparut. Le hameau de quinze cabanes Jamesway rouge vif faisait penser à une traînée de sang sur la neige immaculée. La fumée[…] »\r\n\r\nExtrait de: Rollins, James. « [A vérifier] Mission Iceberg. » iBooks. \r\n', '2018-07-03'),
(3, 'Jean Forteroche', 'Chapitre 3 : Lignes de piégeade', '« 8 avril, 10 h 02\r\nParc national des Portes de l’Arctique\r\nJennifer Aratuk se tenait au-dessus du piège, matraque au poing. Le carcajou siffla, la fixa d’un air méchant et, l’arrière-train relevé, il protégea jalousement sa prise : une martre, prisonnière du collet posé par le père de la jeune femme. Son pelage noir se détachait sur la neige. Elle était morte et enfouie sous une bonne couche de poudreuse, la nuque brisée, mais c’était le carcajou qui l’avait découverte en premier, déterrée et il refusait d’abandonner son trophée congelé.\r\nJennifer agita son gourdin en bois d’aulne.\r\n— Fiche le camp d’ici !\r\nLe mâle au masque blanc poussa un grondement féroce et lui lança un coup de patte, ce qui, en langage animal, était l’équivalent d’un « Va te faire foutre ». Quand il était question de nourriture, les carcajous avaient la réputation d’être assez intrépides pour affronter des loups. Ils possédaient aussi des griffes acérées et de puissantes mâchoires hérissées de crocs pointus.\r\nContrariée mais prudente, Jenny songea à l’assommer. Un coup de bâton sur le crâne le ferait fuir ou l’étourdirait le  « temps qu’elle récupère la martre. Son père troquait ses fourrures contre de l’huile de phoque ou d’autres marchandises locales. Elle venait de passer quarante-huit heures à écumer sa zone d’action, autrement dit à relever les pièges, ramasser les prises et poser de nouveaux appâts. Sa corvée ne l’emballait guère, mais son père souffrait d’arthrite sévère, et elle n’aimait pas le voir s’aventurer seul en forêt.\r\n— D’accord, petit. Je suppose que tu es arrivé ici le premier.\r\nElle détacha la corde pendue au peuplier de Virginie et, une fois la martre libérée de son piège, elle lui donna un petit coup.\r\nLe carcajou grogna, planta ses crocs dans une cuisse gelée de la bête, puis rebroussa chemin avec son butin et regagna son repaire enfoui sous la neige.\r\nJenny le regarda se dandiner. Elle ne raconterait pas à son père qu’elle avait laissé filer l’occasion de rapporter une martre et une peau de carcajou. Il n’aurait pas apprécié. Enfin, bon, elle était shérif du comté, pas trappeuse. Il devait déjà s’estimer heureux qu’elle consacre la moitié de ses quinze jours de congés annuels à relever ses maudits pièges.\r\nLe pas alourdi par ses raquettes de sherpa, elle rejoignit son[…] »\r\n\r\nExtrait de: Rollins, James. « [A vérifier] Mission Iceberg. » iBooks. ', '2018-07-05'),
(4, 'jean forteroche', 'Chapitre 4 : La voie des airs', '« 8 avril, 14 h 42\r\nAu-dessus de la chaîne de Brooks\r\nJennifer Aratuk vérifia sa vitesse propre, son cap et essaya d’oublier le Cessna qui virait vers elle en plein ciel. Pas évident avec Matt qui, le nez presque collé au pare-brise, hurlait :\r\n— Ils arrivent !\r\nSans blague. Elle fit basculer son avion sur la pointe d’une aile, amorça un grand virage et aperçut sa maison en contrebas. Le cellier dévasté fumait encore, et les chiens, surexcités, aboyaient sans bruit. Son cœur se serra. Tant qu’elle ne serait pas de retour ou n’aurait pas envoyé quelqu’un s’occuper d’eux, ses amis à quatre pattes devraient se débrouiller seuls.\r\nPour l’instant, la priorité était néanmoins de survivre.\r\nAlors qu’il rasait les cimes enneigées, son hydravion sembla traverser une averse de grêle. Un crépitement métallique fit vibrer la cabine. Bane se mit à aboyer.\r\n— Ils nous tirent dessus ! s’exclama Craig.\r\nL’aile droite était criblée de plombs. Merde ! Jenny tira violemment sur les manettes, ce qui remonta le nez de l’appareil et leur permit de reprendre un maximum d’altitude.\r\nMatt agrippa ses accoudoirs pour ne pas glisser du siège.\r\n— Attache-toi, grogna Jenny.\r\nLe temps de boucler sa ceinture, il guetta le « retour du Cessna : l’ennemi s’était lancé à leurs trousses.\r\n— Accrochez-vous ! prévint-elle au moment de survoler le point culminant de la vallée.\r\nElle ne pouvait pas laisser l’autre avion reprendre l’ascendant mais, comme son Twin Otter était moins rapide qu’un Cessna, elle était condamnée à l’exploit.\r\nElle rabattit les volets, poussa sur le manche et replongea vers la vallée voisine. Avec ses flancs abrupts, l’endroit ressemblait davantage à une gorge. L’avion dégringola à une vitesse vertigineuse, et Jenny se servit de la gravité pour accélérer encore. Le Twin Otter fondit en piqué vers la grosse rivière qui divisait le canyon en deux.\r\nDerrière elle, le Cessna décrivit un arc de cercle très haut dans le ciel pour tenter à nouveau de dépasser sa proie.\r\nJenny prit un virage serré et suivit le cours d’eau qui serpentait au fond de la gorge.\r\n— Allez, mon grand, murmura-t-elle à son avion.\r\nL’Otter, qu’elle pilotait depuis sa nomination au poste de shérif, l’avait déjà tirée de nombreux pétrins.\r\n— Ils recommencent à nous foncer dessus !\r\n— Je t’entends, Matt.\r\n— Tant mieux.\r\nL’appareil survola la rivière et son enchaînement de rapides. Tout juste… Une brume épaisse flottait au-dessus de l’eau et occultait[…] »\r\n\r\nExtrait de: Rollins, James. « [A vérifier] Mission Iceberg. » iBooks. ', '2018-07-12');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

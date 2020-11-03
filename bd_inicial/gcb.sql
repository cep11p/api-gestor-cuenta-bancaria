-- MySQL dump 10.16  Distrib 10.1.47-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: gcb
-- ------------------------------------------------------
-- Server version	10.4.12-MariaDB-1:10.4.12+maria~bionic

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `audit_data`
--

DROP TABLE IF EXISTS `audit_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audit_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `data` blob DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_audit_data_entry_id` (`entry_id`),
  CONSTRAINT `fk_audit_data_entry_id` FOREIGN KEY (`entry_id`) REFERENCES `audit_entry` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_data`
--

LOCK TABLES `audit_data` WRITE;
/*!40000 ALTER TABLE `audit_data` DISABLE KEYS */;
INSERT INTO `audit_data` VALUES (1,1,'audit/request','xœåX{o£Hÿÿ>²”ÓÌnl^¶!dsZãGÆ6àLf5’Õ@Ûfb8ñf•ï~ÕüH<›İ=î¤•’@WWWWıêI!·Œß\nC3jó*–¸¨]\"C2~{.Y2jE‰ÊMa¥®]Æ†\"I—@o\ZµÛà¢ìcáœar`k™e°©F\reqcU\Z¢%‚ÌMó:Zà„±Ipf”>Å«[\rIxw\'Ë—Â0N6[a«·gíæ{ÁÌ²ş„ƒq)¶T­¡¶…wûşhx.¬â{,ôpxŸ¾¬e®±¨Ë\r©Ñ”šÍÆ…\"xhò˜ŸªqõÃ4)áşú\n\'‹rI¨ ¬\"Ëä­\rj‡!Î˜v\np—x[ŠËr½:G G¢2NqK(?n_R×«ËoWRãâ<^ƒâ#2şŠ²dqşƒøİ×Nñ\"ÁQoÃ%Jøòá*P™ªD«R©“0âdQ¼xŠ³s!Âà¼¿à]¨\r\\LÈ\nğâ¢n{ç¸àúá„)R‰\nQ¸Äu‚LR_]µ5ÚO]I‹=på¯•«R\'˜_||¬ÏÓ|]ßä+ª-8ªašŞÇL–“şÄ³=oĞ¹ºÃ¹ÔTu|Dm‘ª#	Ë$·”f;Ò/…YXäó«HCk„® öE[\nu¹%Íçsm`¡0hXkÊ)\nR°¢„Z¨µ#µHQ¤5#©¦¿gÚ‡Ò™ú¡€g‹…ŞO ’]™ïª\nÛşŠ¶OYıiøp?\ZÒÉX3›SàÂ-~¹³g_oÙÉ3­Ã­Móx\'ÔZˆùeYf†(¾Ê¤Òç8\'«¦všS$)#æxeÎ€fvLŸo²E¹X“‡›×y†ÔsF†6}K¼óˆrğK=Ks\ZåàX¹X?f€kØÄùr¡\0¡(Ræ-ÜƒVõ8«’[Ö”†\"AşÁ…Ï,s\\d)¨uP,š¼æØÛ,Î1ÕQişrs.ÈÂ8}€‡.’n´C’„ŞÈ¯âÔ¢qjíãT…;’´^”iÏx£‘|.¬7E	ê= Uñì a—£Å\Z‘…NQæÊB‹‡·ÏÃû(û/ÈÎ¼ÀåÕÔïÖuj1/İ0áJ›Õ¶ï;Š–B¥XEø¾ÌãÍú9÷…çŞ\n@úâÈ°vtÃ`ç].ôİûJsFŸ ­J8@uç$ØA+4ÜºÆå2¥Y	æMÏçºÅ…	Q^»©\"L\Z!tI—¨($\\âÂ£J&˜Gv‰óå]£øF¿T¢ÂÒ‚ÿg	ğ¹è‘UÏ*ƒ=¹Ş,¦rÖñnŠb9¿’ëÛ»ëğ)ı<Î»ıüÛú&élûIx½ºmßom2uUÔÍù”Ş|íßL½´ÿñ¶é¹I¿•q¶\'ƒñÈ|<S;ğóÏÊƒT›³Ö¼Fñê¬Õ¹BÑ:NÎšR˜æ9Naº~ÅKüš 5Ş±¿âÈPQ<¦y´ã``w05Z(SaïW…\0ØâvÓ(üwÌ¿ºªRîHçA\nEUY¨ö?ïÁà9VA@–-ÎÅ·*Û«Üàæ???Óµg»·¶Kë\r]RL\\»3pmËŸy¾éO½ªuKUAêûşdÖç1}ziq®)ÈŸ™={ìÿÏæËûpÿlh{~ÿx!ÑMõ4-Ëøÿ7ÓigzÍì±åtãŞwG’—†æ¸7ÜÿÈ\\¢ó£–iõíËu†ßN*4ıÏûOÕ”Ô–ã|Ø‹eg³ãzƒñ[ƒ\nÁ—²»v×vIVşåqE­âa:é¹fÇ\rÆmM]dßLmÏ÷g–]ôÜÍºûÉt;v‡¼\Z8ˆÛNpÿn98ybâ¸şÑ`¤(§¸\\Çwx%8TıŠ±*d§Ç(Rø×6‡³Áä´m¤Y›¬JÈ0Õ\0t€şˆ8‰Ò\\âÄó4-ER~³”xápkSä\"sPñb½[î7è[¬`Ë»’<ó½1”_—¦ŠŠıæÀ WüËÌÈ<%*fCÕ…wÄ(y/xtP)9@˜À*èÒObuşU‰®nrº> hWN8-¿\nh~hlìï×ÿ=ŸÙé¼#ıÓ«X {®=r|û´\0¥ººãXÓ)H®ãø¼åQA®ÏC~æA}cJÓ®EÜùlvwpG¨pW¸Õæ›7)6X¶ËPBa{H^şLáÙ}ºü-w\0Åº;€ŞTÁy UŒ“oÙ2{IˆhJ²®T×ï\Z÷Ô¥\\âñF¡ CPÏôíOæg¨¾ívMËæ_MVo Ê,/¢…f¤Å:o;®°G¶ßw:/`¢$l»Ÿa´py?ãP3óØÙ©;ø£êË;w‚ÀcätÚe B»§èÕİş`dÏºCÇ…#ÈG-”Vó¢İP5eó•üËfÏÄ¬Eùâaÿ}À!a¤;mÏöö<—Á“.«)€}q0Ğş0¿5ğ;w`É¤éıÇÃÑ\'¦_^{Ùàb®Ó[íì«¾YIV{GŸ‰Ô<gLÿ“Ç?Îg³9ûØclÏÏÿ(¥+!','2020-11-03 17:44:56'),(2,1,'audit/db','xœí]TÙ×? ˆ®ÅÅz,DœšÌ!‘N@Š£!$D’\0I@À‚ºØP@¬ë.Åµwq­kÇŠº`]Aì«Â\"+º–Û7“€‚qıïú\rç™É¼÷î+¿ûË½ïİy#ä‚Ü‰J.Æ5–‘J¥0œT\Z[¹0Â(á\"Ô›>¬•\\˜Í5æô\n`9û»»³x^îş|–³¯—+D+–¨¤\\¥H1¶–pAê¨ˆÊ\\ã‰„‡¼(™L(s¹1±¤\"N	[‹¹ @Ep¶Œlˆm­\rjD¹(]C„k&‘’ÆT‰Ê5&ŒGÊÅQŠa¡¤˜L”„Ë‡Qb Kue†)¢aöô™UtD´:×X*‘“´Pˆ¡nrX¬\\¤’DÉéû • œTù	C¥$_AÊ„ô·”$‘T¨TªSpê5D.\'ßf¥rª¢ÕUƒ¸Æ–¶ÆÖ“\'K¸(-	ÆØX«/[Ğ™8»Y	Á8ò5u&0Dw&§~gr8”t¾“»Ïïõ)Š\r±\náyyòı|í]=ıöN!,{>+D%WªB‰\\%edˆEÃô84H-•Éµ¤ôurvòuòä99\nüìÜêåQa¤‚”‹H±@E7ÿã¹?Y/{}éßh°!‘‡E)dBº¯Ju¿¾+ÎÏÕŞ]ğ®ÑüÚòD!ßŒòrõl$¯›SP]üùö.µ• «ÉòòT×ÙLı©½_yö~öî^.!,µ í÷¼|ß–`ö‘\"\\ù,OZì=?RXm*su‘ætâF†œÏéäa¯µfu·\ZÏ¬-YÕ7¾	IõwãåÚ°ÄBjè…JÒÌ\\Ó\0\rR´¥úæ]£ëÃÉ†eZL?,Kk²0„!øWÄ€Q4g`g0œÁpÆG9£™vÌĞ¯‰3@â¨í¨O\Z FõŠ«\'ßÉ×E\rWC[Bª\"*VEé-+$VI*1}*‰¦?…ã…ñôQAR½¨T	d¤*\"J}_¤ …*RbÎ\ZmïîïÄg™™Ò¹‡)Èp	M;t}k/H…©…\ZÊ,SYA€`RßÔŞ^|?êÔ À-˜EµA¸(ÛÔüÃßøÃñ%ãIU­#Œâ”á¥a¸±F9Ÿ6Â²(1)UjÚ‰î:-£\r²±G›º¯Æ‘ïq½¶8PªaO¥#}IQ”BÜÈ@Óñyër>¬>eó+ŞÖª~`Jp0‚F¨…\ZAÄ;A6ú\ns­mĞ\0¶ÛÀåÖÓ=ÀÆqî_—î½ãÖ¤{ŒB ‡Ñ=F÷¾€îá €¨‡®¯{lN­Ìr\ntåûñÍj¯†ÔNYĞJÂª5qÔVêƒÚµ1Še¹¶¡`d 0\"X­\Z@ªÖ°ßÅd¤J!‰•iú]­Ûµò­§âÎ”«M\0øÃA .ã„R‰XË0ĞÆİÚ>#<h1ÿHØx“u§<•\"J*%\rÀ{û½¶fÀZ\'ŒÖ\r¯iCSl‚[‡£÷»¬	+\nÃ90¢AòÑÔ,“A\0ã0hú/¡	4~<ÈnàÈ£Í@å\'H¤uP\ZAı,(È(+Q”¬¥…€Š3¨úï \n ŒÂİZÎ@U3¹\nBp˜AÕ	UÊV/ú€x}TAxã«>jµ}`´né¬q?¡Uakq@Ê#P’*{Un(åÒ([,­ÛĞÒ:A”PÜxZ\níNÃW§0°Õ 4K\ršI—(‡ƒ1zÀèÁ¿Fª§´ ¨‘ÁF˜5(f\rê«\\ƒ¢Õåc‹Oêû-4wØŞôšÃóÏ)GADÁÏ3<Ïğü{<ßL{ƒ Í34ÿï¡ye«g¢!ô3®k4Ó(Â0¼ÉÅb„ı©XóWjízü¬·®‚@ÿ;Úvèúÿ­\rlŒjŒögÔ†fştà(Ğä”(£\rŒ6´š6p\0¬Öhnü¯Z¥Äq6Ìh£_N+PP¯‡AøĞŠæıV \0Útˆ+£ŒV´Vp`H­pƒHWÄß‹tÕ¨Y-ôkC\\5Ó6ê£0‰BFŠB•:Ú5V!ˆ$4¯ïj$ĞÃFS­˜@!H!TFÔ‹­Í-®»ªû®Y°j\r4Ö;¢¾T†F\"1¿ H\\ˆ%œQ(<Îm$ßŒÇàPiıèYˆ¾\Z%AÃü¬ì#½­áHGÕh ÜƒÆ&$„anr— Q>ÇÄQ\0ôôvI\0pPâ†’¾Ê€÷¤¿;oi¼;\nƒ(C|A*`c\Z*€*ø<TĞÌğ{Ê(\08MÎ?2dÀAë‘^.\07Ü€j<l&ZEwGËÈ(¨C_`ºE´ô«æ~äç‚ú¿^?µû?§ŸoŒá ¤!‡Ñæ\"¸YN…`6†3fÜ2Ã\0\0Bšm[à÷¶\Z˜¥|f)ÿ«\\Ê¯eà­æ×%i©™}ùg†¤¿~’fS~³š¤1†¤’fHZ+I7Ó’†ém\0’fHº…$\rÍSàHƒ‡€ä½™Í:\"Z½ƒÇ»iG°å3ú0ÔôÓq<7‰gÔ<Û‰€­çfOKÃ2xfğÜb<#µ{¾ \rg›Ñ¦v¨U¯@µĞä€ì&ZÑ÷ğĞØ^:ÑB9İ¿Tµ¼éÓOÜˆj§@ $UŸÎ­X}D,\ZßØˆ­}S â­œslætÁZÕÂ@íjIõAçšÎ§1¦î~ÍæÔM€Á)VÔ€m˜›i1cĞ$#3`fÀü‰`Fªó{sĞlfzƒ™Şø*§7Ş‘qÓ;×ªSµĞşÀP¨É™h†²ÊşTÊ¦÷\rÖ8‡CÙe3”ıÊn¦•ƒhÓ3”ÍPö§R6»öùE´á&U½s¼–\r§Õ\"Ko¨[»Ï´2V$¢¤…ÅªCrÃQ2ú¨ŠÒŞFKÕ¸\"ıª9(cCÇ“\"uœ­ŠŒW#T2uvZé´oN\rZ°ÀºpÛd¼P-%Äà6ŒËÕìV]ÿÓÔABÊ©qˆ£XB–GË>:Z*©—.$>³{*HÈœ&d9ˆ;O[PEÈûííFÈñiÚÉµhÍë|q½Kşñ?¤]®İ~C[ıÕ·]|àª®!%ó9§R½!Û	û»xızò¥Áè±„¢dÆèàFl—=åæx}í¢Ò¶%e«•İäS^şü³t‰á½5ÄÇ÷PÆµîÁ \0A¼©H{kês5ğJZ`0ùA@§ ãØ±{;v¿rfTnÇàAVCÍtû_/%‚ûZcò¢G.Ã«N=7^]ÕÓ€UlQÈË*†³ñì3®?¸=Ñ‡0-¿ÊMŠaÇOxŞ~°•Oôóš›E„i¸Aò¼¸­èş¤èÎQÃÚÍvØØ;ï°\"Ë•0M½›²Íål›öƒW÷;ñhxÔİ“¢“Òê¶,é9Îƒ°@JÈ	ÓéEÎ[/Gg›e=Ù½N’•™i±ºM~™ƒĞ®Wïª#]½V«nêmèÍí­ŒOãïW&:pşâÅ‡˜ÌšŸ¡\'œ9:m¯wÄéß	Óû#†¦È\'Ø»¦Şl{\'şV¹Ïö«3’¯l+î7{ï|Å€Uı_$9Š˜R ‚´í§_`Éƒ^©±:ÇVõİY©ÿK7ù…ØBpæqØdQq óÃÛ~…5y%¾CúZøZTDc~]ynFüÙÌ-o«±ıI›çXVUŠÔÀÃÑ}ûR;¬×ÎW;îé;ËhPU€…Ç¼˜…ºv[ú­_8œs b`yÇ_âí\nFÎbÁû¼	`WYù©c\"·Gc÷”®¿<éˆÛúµßv«÷ñ¥ú„é¯–^ÏÚŒ<µ´j°‘SEÙ˜±™ë¶?I‰LÍ6Ü	m:™¹.x7W–c“Y|yù\"ƒô¹Ûrşê	¹u_›:óô1£!73«öòô8Gïçğè|KWİÍ6èØÆ®Ñíh¹K×uÓ^håª©ßùü¾õ‘O©ğ¡Ÿ„	Vï\"äyÜqvwgrº__R\"8C×±Ù‘+#øûÇ™—6\ZÜG¬\\úzŒİŸ5!×¯\\°5;Bd¸å4Ø¿+Œ‹.:ÙqåßÂ•\'/9ß^Sòz<!¸h|\'ıâj©N—~ı²\r$óÏ˜vùÛ¥7B_.èsïŞıq®ì|`Ì÷x(a|\"xÕ/G.—<ìœG(¼íõw\\\n„ÒOï;’L\0Á> CŠbEµË¶±i‘o.[š,ì*7»\0ã¿]İßù˜J¿v[6IŒ¿ã³¸cÚìô›;öyIÎLø9ÌcÅ	ûÜÅ¯ï=ŞêşÛş”	·÷Œ½ê§ÿ¼ÛˆwEy·~<—í{çÙ/åvkô]®TØ?]2í»¸Q{lyXõ—ÇMI[qWn—‘\\5(d!H‘7¾··.æêÿsæÙ—úFo*í²²ØÓÿìrTÄkÔïxàe)ÖmJøÌ7Ë/”T=qyê€¼k%#	Ó,ÉŞ,Ë«gøÎºÅ¥K†Îu«©|Ö·„PìjÓawá³°]+2ÄãSs~“ì3®j	aÚ!KQùêÜÀW1Û‹Æï¾ê¹ıö8÷2çß¢0+Yl‚hRáØÓe¤Ç“õv[ô/¬Í«ODŸåG]Dİ™d­áÁ÷²+«:?¿:mcğóáFIw>Í“·R/½íÂäW&*zŸœV½¾´aô5óŞ‰É?{;Fı23æpåÁNg¼|~yé¨˜e¶&\'M”½:î¯»ĞæÂº£Ü\0èÂğ—ÊmÛm?’°ÜÉ}ñ.Éò_RB–é=ğ*¶¸×uåS¼÷õ)3qÏOHM»½·`×•ª²Ô«Êk™Hé½‡¬ï–ı4ecÕ¾ıoî\"Le³ò2ƒwN·;ÃRâ[PšÖfÈŠşÃıL¢ËİÄĞ±¿·B›nÙT™¿Ôİ‘Ÿ>)Ç­`Y÷¡]%ÜÎñã‹S;•÷¾6)Û0©3ßü¦ÏœHhå <Öß)|çÊŠ_½æëæèíïC\0.)/BçñâWà®	„éğ©fòü#«wuï X8äÈâtªBXä3ÛÇßné,?U³•%]sôFàÁša3“\"õõ+•‡Aê¤šGO¾ê»]úâÁ¥Å²..¼GgÊŸ¶¹Ûü^·Ãªi2AÒ¦ŒR÷ÊËÛ«î(‚ôí–nŞëÇŸøxí‡=í\nÏÊ-³~$ˆğ..ŸTvŞ¿—ã©åhY§KåqûÌSÕØŞÀºã‚\r‰à”×n•ÇçŞ ‚CİláI±K&ê¾)ûŞ`Õ›ì7“8¯+Ú”<¬èÚfÉl£Ã‘Gc¦TfŒp,û!Ì’XlòLOöóĞó[V4\\£ïÖ;6q}ÏùÕK_ì‚\"Gè®CµÉªÙ[ìu—åŞ8º:$±gŞ°ä.e×øcV!¬Ş=ŞØöì˜¹¨K’eNXbÂ‹ü›|\\¸7_Xº,ãÕ6ñ3ñğ\'$«»îşLUuÀà¹q÷)tª\\§l61J24ğ…¹‹|ÏvÊC.L5‹8R’8ßùÂhI¾Åéƒ…†SçˆM<,³âa¯ûŒjÉÀ.s—=éx^Ü«pâ!3°[>ÇuÔïg‚©1°h\nÄõâõ©ĞÙ‘ÓéÎğ¡Öóƒ¯«n-9œ<f£Ë%İË§n™O	é·i©Ã¶ù÷ÿˆÜµË`¡ìPÊ”ÓÒ=/üU…GnºæŞIgLx›Ñı¥|‚¸HÈÑÇ…q6¼ıŸ³”ãâô7¯êjØAúSnY¯âS»jf©H²CqË‹{5•¯·}>ÛfhÁ™‘„±j9ÍÜ kJÌ÷¿ÀÇvÓ3–\Zê\'\rşõ;tÆLçÁ=œ¾ıirÕµ³:Uˆ¹GwG¡Èót[Û›“J[°irß=|R0{qMÛÒ§“LzlN*ã@E:÷»M÷;×¹²OºeX¯ïx‹óÚÍÕ©ò&«/ßR$Ş{r»ÀgÄ…ª(U¾âşâ¤í2Ÿ3÷]ùünzøù‰b·¼ë:\\wØ]Ÿl=EÖön€]/¦•	èÃù²¢ÅÅé\'gï( LÛwŠ+\n²~=¯²Ë‚Ç—ÍˆàßÎçòş´Ú&sFšmûŸîÇcoÚ›™”Oİ\0ü3ÑjÿÎ¥Õ„¼¿ÈÅê\0èk~gwÍ…Âœf^áòméWs@æ2mAÂş§¹›Æ¦n™ÎË){Ø6cîÔ¸”±æ†}Ûü5 ôÇfÖ&NsRù’¡Rê÷oıñ±Úó\\û<7û©ï¶W–P´Ï¢RW¶‡ˆ½æŠgEîB¿ãmK¶Œ~6ƒ‰Mâª–Èƒ•;ÍNœó\\éÔ!¨cÚmU¹×Rƒª¶İs‚Ò#ÎİùªgÎgş¿Î;7Â}àB÷=æÒ}\'¿Í.Vj[ÑÃfï¡Qp»¥.âp6\"Ê”§ùg:gŸI;o9cãïå76à{î/±ksûdMaø\\÷õÒA›Í‘zHĞ{D\0Ï®O÷İı:Éë¸şºÎ}e,ëóÒ`Y½´š2YĞÅQ›ŸYä?×‹ƒP\0¡¦_^Òzş®å½Ÿû1*Æ[ûrŞ\ZÖ>Y‚‚Œ·ÆxkŒ·ÆxkŒ·ÆxkŒ·ÆxkŒ·ÆxkŒ·Ö¢ b`É6ÆYûÊ5ví+ÛĞÑ˜åªù{;Úû9½÷W¾“åPÅjb£Cl\0+Ç\0AÇ €MyY2REùq2a|ˆ\rŒC8Ìa×mGùv6`K§+8Ì®{J¤ñWmµæ»V1ô‹ë@‹ßÄÍÑ_O_JäB©$ñƒz·ô«uxâ\0»Oì/Œ§f*06ÄàéßŠ\'6L?Ê3yòÿ ˆĞ','2020-11-03 17:44:56'),(3,1,'audit/log','xœí\\TYÔ> ˆ®ÅÅz,Di3“IEÀŠH\'¡:˜„d„H\n¤  ˆºØP@Ttİ¥¸bWWEÖ½,X@WûZXdE×²bûg&t‚®?º¿ëçÌdŞ{·¼ïŞ÷î}ï€	2g(™t¦±U*á¨ÒØVÀ„ æ1À®¨š%“Le\Zs&z’\\ü=<HloO/ÉÅÏÛ“Ä¨Eb•©q|c[1ÄşaìÂêA Ó8N,FDa[.•\nd\"&3Z*âğ‚d[¤0Q`ÕšL§Sa2QY€ó¥a‚33§Š%¨1Ö\"La\ZÛ¢¢lbP™H®°	CEh¼8\\fƒ‘¬^l”\n¡\r¿²Šˆ\"*1%bŠ… ª-!ñTµL¨Ëeøs+ª¸‚0	ÊF Rş+FI((•D	ZAd2´©*VSE°1­ìmÄL\nN‰L¦\0dÈ6WI]R0xG¡2±,œääH65Ç$Iã”Ñf„\\©²†ñDa¶¢0™@ŠâwíTKÖÂ“)ÇZÖ®\\\Z\0UÊ¥Á0W.µ¥ri4Œ:ÇÙÃ™Íı†„ıñ#…j¾5ŸííÅáú±Ü¼¸</–§3ŸÄâø˜æ•*…@,Sñp%ó-[×À1Şª´D-•i)éçìâìçìÅvvâqYÎ-ê(Ğ©¨•	QO…‹ÿşÚíH¶¨Ş’ú7\Z»Ë¦ÊR®+’Ğkss\\7–¯YhNC{Bş7“¼İ¼:¨ëîÜÈƒ?‡åÚÀÎ&ÉÛ‹àÙŒøÔ®W6‹Ëòğvå“ìBÚŸyû5µ`ö&Ü8$/ÜÑ°¼œŞÓXC)s¢Is¼p]ÎaOtödiå¬ñQÇ•5İ¡¥*ñà›À‰˜¾;n×$`]/P¢fæ\Zq44HÑVê›f¡[ÂÉdÚÂÑš¶oKk±NùcD¿&T\0‚q—Áhé2@:¦7/³—„uwë\rÃ©B®VaVKâ«•¨‚\'á—â(üS0M‹+PL‰JOŠª\"äÄs¡¨PßœÀòğwæÌLñÚ6\n4\\Œ;œİ†TajI\0Ù’d\nÒ k°¬Aì7\0ûÁÇ›ÃÅ.M!\0¬@Ğ\n “0Ña˜I¡šš¿wHhè]4bìkí_\nAmè_rGıK¡ı³ş•ÊE¨D©éfg\\sZú\Z¤ÒÛ÷5ö\\)ˆAÛvpY1»`aåcP?T(Wˆ:èfÍ0û9ù§ĞÚ³MŒM\\µ€Œn$†àÄ‚¢!„4êPè3˜6jj•Aƒ×O(“ÙÂòh\0…DA-MJk¬IÎAn.Ç¬án\\ÃÜ·>©ÁÇ7ÖÄ1Ú™\nDR±L‹|„—ƒÉ€Ñèå ­€ŞZí\"4R¥«¥\Zµ–İ\0 ¿î‚±ÚÌ\0 ·ïì6F ‹´ôî\rqqğññÄÉ|”Pä›	©r‰U´€İô»61ÈZ<77WÓ¦FÚN¶FmUö7NgP`šfZMi5õ£ü/À„\r-bI#’&`v¬@åÖB¹´“ ‚A2Òªÿ¨\0À j<½%¨ FÇ/¡ÎÁ„ÿƒø“Â„¬e±±V‰ªX*¬İ0l² üÄ`ù´€€ö	£D.u,Bg¢}8şêÌ\0b4˜Ô*gA£Â]auWXıU†Õ¸¹¼/&wÎÍS!2­ËÍw¹ù/ÆÍÃ4:H%¤…¿´x¦ÓÉà‡Œ¦şS¨ù+µjş¤\">­}@ˆÒtpıÿ6*¦iAˆöÅÆ“FS*¶Ë(ºŒâó\r³byÜz!d´I–k¬À¬ù\rYrÍ„œˆ¦ŠRl¦-P	sµ*‚‰Æi’æÍñ4ùô(LŠé‚xeD‹4zCmu”¨ñ®E^½©Y’\Z\"KR³\ra?*Ã\"\'¡tWnp$C@ã¹P ğ÷‰/ˆ7Nóe›¶LÀCøİ(nŒ±áZ³\"}œ¬ãÉ‘Nª\0 Ü“­ÕqqSéî2×àI¾b§øI\0õòq Ø‚ú)ÛPo¾îdÚB±Ñ»Ëtù‚ÏĞ¨t\")@&·òPÇ¹±(…WG§Òc22>ÿ¨Gµ¨Uó<òs!ı‹7Om¸şÏ™g€é4\0Ğfm6‹\0]Y­®¬ÖW™ÕjpÀïKl5é¤¦Ã\\ÂèòÑ]>úı>š\0dP³ò@nµ;†ÛÄ3Ì\'4îÇiÀNO®ÉLé‚sœ;\rçÆ…4¸õ<©„É‚oş%\"f’±£•aâ‰Er’€äGbEEIÄBBc’JN2nà\Z·Ã8E£m¼=BßØª`2•%­(§0>¼ ƒÔ½†¶]}tP;V†Ú¨hË½f/úÇ¡»Ì‚4J{fAPÃmfÚ2İ\Zšæ?\nİ7Iˆ¡…sº†ó@T‚ı44â\Z¦Bø–×­cAÊ‡é¡ÎM5h ùƒá …úÏ6ÈE	d¸bq¡}ğË¸İ“ÇS¢ªÏ–ùtìÃZ¼]Ç»©Úwúiè Mt>ß_¦iÂ2$DânR»ÂÂ®°ğ«›}ñ‡¥:ç±é0Ñå±»<ö\'òØ€6xìVA\"Fš¦õ1éÀ§ğMê\rG7”j¡£6UM¬VMUÈ¥ø·J®Y“Š’‹SB!ş¦ùRªÃ¦¡Bb	J…Æß*)Q·9íç=@KØ¸5H£$h«å©ÖKVš -?MßàÄfLÙQ óô,GQß9ËJ²Ùˆ½cÎ–ã\n¬FÛ²û^Úìzêø’~×ï¼CB¬ÿ\ZŞ#6h]~ÅRÚéÈ~úşŒo36oF_„\"ŠŠy? ÀMu¿¢ætcãŠÊîUë•d³^ÿü³\0t¦½š4Î×ïPúõæÁàµ\0‚¼«N‡jø¹t5µ0HxØ\'xÔªzoïWÏN*è2ÆÚÂLwäµØJ$d¸-]VöÄu|İ1£Ãi ×ÖkëÊ-KÙYåälFöY·ŸKÜ™á‹˜>¸ÆLŒ¦ÆNÙs¬µoÔËú[eˆi¸AÒ’{áÃ™Q}å6=Îe;nZ|X‘å†˜¦ÜKŞáz®[Ï±¥ëGœx2^~ï¤§ğ¤¤nYÉü•ƒ§x²—Ib:·Ìeû•¨l³¬g{6‰³23-×w;Uå(p2´öHïu!ª›¥z[†2‡*cS9û•Añ´À¿Ø±|“ÀKÓõóR÷úDœù1}8Á\"Y6å–r«ûİØÛ|w^›—tuGùˆ…{—*F­ù*N@SDW\"\0r ûıCH6ôNQë[7|wş/dÓ—ƒó{\"À6Ëê}ßá–ÖWønégYEŸşkîùy±G¤óóßÅ×Ñ÷\'æ-²ª­F)A‡£†C%ô!»ßì6zxdø£1µ–K¢—ë:äØ¼|<;úÀ©AzÿëP2q	Ùçƒ\0…Uİd§	İŸ„Un¾2óÈ°çöÜq{èñUúˆé¯VŞ/ºM<½ªv¬‘suÕäĞÌM;Ÿ%Ç¥dî†¶ÌÜ²‡)Í±Ë,¿²f…AÚâ9\r†ÜnL™æ˜Ñ¸[™uqEˆ,-ÆÉ×ç%9à”•›¯n^¯<{õİŞV…ºn›œ÷B¹ëfçûûö\'¾ƒf÷bXŒvy6•·¾‘3§8<Ş“Ixceï,‚Ü /ŒÌüáïç_Şjğ~\Z˜»êíd‡?ëù×Ÿæ-Û!4Ì?ì\0S¢ÊNöÎı[{òb™Ë\ro§!²Ç+¦õÑ/¯“èô»ÈM‘mx$‰=vŞœ+ß®ºUöæLÉ°û÷ïÆéOq{´ìxPß“¿g„!Æ\'BÖıräJÅ#Şî%ˆÂ‡¥¿ër”vfß‘$p½üW† kë\\w„V§F¾»be²| E™ç\nLûvıÈ}¢k¸=òó&ÇÇŞõÍèº0mm^ïa¯ÑÅ¼é?Oõ\\{‚UağöşÓí¿½ãÌš~§(ôš_ŒşËİzßşñ|¶ßİ¿<pØ ïzµšõ8 bÎw1¯äEGò×şÅd3“S×Ş“Ä¤\'Õá/G\0	üÎïÎö€r¦Şñ?çŸ{­oô®Æ!+‹:÷Ï~—@E¬ÆüMVVÒÌ\nŸÿnÍÅŠê£\'®ÌU<a£x\"bš%Ş›euí,Ç%H·¼r¥Åb÷úšÃ+Ea·^{JX@/|ZùA^ô›xÏä)µ+Ó^YŠš7çG¿‰ŞY6mÏ5¯w¦xT¹ü&§[KÕqÂ™¥¡gªhğ g›òõ/n,®™†N¤¼8Qznabltw.œµ„ÜÏ®‰¯íûòÚœ­!/Ç%Ş=øüÔäâ\\½´îË“–]¡zrNİæAĞ–€ëæCã“~öq’ÿ<?úpÍÁ>[3Ò_¿¼²jRôjû	‰3¤oûë.·»¸é(3º8şâåö=v‰[ãì‘Q(^óK2µŞ#‘åış¹ÌòÙ7¬ÊÄ¼0=%õÎŞ’Â«µU)×”×3áÊûƒ=ÙŞ«úiÖÖÚ}ûgÜ*DL¥Š3CvÏu8ËŒšUáWX™ÚmÜÚ‘Ã¹&Òï^|Xèï=Æ!!&†ùÛjN­òpâ¤ÍÌq/Y=Ğ¢¿˜Ù7vZyJŸC¯ÏÌ6LìË1¿å»(ÊSLú;™ãRSı«÷Rİ½ıÃÀ5ùUØvìZ†[b:~¶Ù–bÿÈºÂ½xË‚ÆÉXöGŸ:€?Êò” ³gtù]à¶ÎšÓõÛI’\rGo¬·™Ÿˆ )oß¨<\rRfÖ?y~ô•…ßNÉ«G—3¤ı\\ÙOÎ•<xŞíŞ`ğ{İ^ëæHy‰ÛÒ+=j®ì¬½«ÖwX•·—Ë™ñtãÇ¢¥çdVY?\"Hø—ÖÌ¬ŸzÁˆÓé5”ª>—Äì3wISo“®Ğbˆ„$ß¼>z»,¶à&ænÿ„‘¨^9C÷]Õ÷ëŞe§»›D À]á¶$°º·•GU“>Á©ê‡h0Kl¹Í+-‰ë©Ç]]6\ZÜ ï>T¿yğR§ºU‡/õcŒA\'¶ğcÉº…ù,İÕ7®çÇ÷ -±IêTyO;fÍ\'\rôÎ~pïÌıu¬rz!ÀJväßèÓÒ½§•«Óßì½†’êîÏTÕ\\sÿE°B§ÖmV‰Q¢¡™¹Âï\\Ÿbøâl³ˆ#ñK].ˆOY9Xj8{‘èØŒcÀjkö”	,İ˜$£û-^ı¬÷ÑÒ™°§ÔÀaÍ\"·I¿Ÿ\rÁúüÑŠY3„=¬ZgWNŸ»ã-l—†ÜPİÎˆ>œ4y«ëeİ+§o›Ïâ÷‰Ù¶ÊqÇÒ‡D\Z,—JuÆQRôÊ_Uzä`^ğu>:“Ã»Œ”pä\"£<-Esá=ÿ´\\ œ£¿uZmÃ^’Ÿ\nª†”ŸŞãX¿@…¢½Ê£IŞˆÌæÍlŞÎ¥T;‹’³cU>:ÇÜ rô÷¿!@‘S¹é«õÇşúeŞ|—±ƒœ¿ı)¡öú9ZX-ÒİU*ô:ÓİşVÂÁòI©Ë¶%/âèT‚Ùõİ+ŸÏ4”—XEƒÊtHMq¾oÍ°4«©C¾cg÷X¬SëƒÖ]¹­ˆóìN‰ï„]ËUrÕ)=ØãÕIûÕ¾gºñŸøİLÊá—\'Êİ‹oèlqÛeWv#Áv–´û½A…¯æ„Jyø×…ª²Œò4Ï“Êw• ¦=ûÄ”Û¾]RÓoÙÓ+fHÈo\n8NZo—9/Õ¾çOcé½o±ÌLÌŞü=Ãzÿîİ•uˆl¤ĞÕú\0èS`~wOıÅÒœÁfŞá²–i×r@ê:gYÜşçÛBSòç²s*CÛ§/“jn8¼Û_£Â~¼if{ w†–Â[H°ñoóñĞeİÏ{m|YıÜoÇ«\'Ê°•nTO!uÃU¯ê‚åÜãİ+ò^,İbb¿nü(w·Ù	ƒó^¹Î½‚{§ŞQ=ğ^ePÛ}`NpZÄ9‹}á‘oçìzáÿë’ó<F/÷(ª6—ì;ùmÙèRíéîÕƒìöšDî1ºòÏ4ÚVX™üüÔÙ¾ÙgS/XÍÛúûƒ›[EW:t»s²¾Ş0|±ÇfÉ˜¼CÁ‹$>£âô À¥s›Óüö¼Mô>®¿©ï°Cé«‡½6X=R/µ¾J\Z|iRŞ#ë’Ág:Llzı/Fk-GQ?÷£®`íßÖÈ  –@(­–@@b	D©Äˆ’”*›:J2LGÃ†¢¾Ù„BeÀŒÆ$Ã¿tÖÒr6Èº«\\0¥E´U Hi\'ÎG¡ö+ÛPF¦@TDìÇ¡´ZD``r²ˆà_÷¡aêğpTA+±k™‘DjâæCˆD\n¼ö±C0oMâF ¤†W1àëk-ŠaM4ïìlDÔˆ6FƒsÁ	âç^Ô”ÉF ÂH\r7ÚPG#S¨´¡jzù€®´‘âäj•Ò3$™–î iY_Å\ZÀúÜQ.Šk*¨TXó_¢`-n…ğŠ2Q{<ŒçšÛı\0zh0¤KP”V‡Wè˜®ü}œX\\ç6oğà8sI|‘ZÃ>ß°t€ƒ …A‡\0ª%‰/E¥rEO*ˆåÛ‘ƒL£6îë‹øv`\'V\ZLnz÷RÇêS¾hƒ®eEó3­~Œ6øã·b™@\"oÇwgß¯Ñ\'€iv·RhÿQgDArÓ–p€9£Y4*ñ¦„„„ÿ|äjõ','2020-11-03 17:44:56'),(4,1,'audit/profiling','xœí]T××?`A£G1X…\r@§ïÌ\" ,E¤³ ÅÑeÙaeì.(¢ÆŠvcB1ö^b{	X@#ˆ=‚D4–ˆí›Ù]\"è\"Ğâ7œÃÎÌÎÌ{÷İ÷»¿½÷½;oD<˜7VÍÃxrJ®T%YØKy00³Wó…F*§,ì%<ÀB0á(\"ŒA0}gnS«EQ”ÚÂ^Äƒ1ŞX)¢÷´;\0}\nò,üb)…TÅquáˆ•\n%ÖH•\nG¤“ñ¢•jC”8R(‰´—D*DrŠ9bÄ\0é°g\nTó ˜g‘$•’’H’ÿ¶’.Z+2-!ˆ¡ÙÁ8Î…ú{„–ÔÉ\"â¡LKé&’Êè&Ñ»(Ïb (6v`¥(U#)	•,R¤+‚lEñ©f Z%èÌìÙÅFÇZèT\"“*(¦RÂt:¯ĞÊÃœé¢(M(RF	ÄÑ”\\Ä|K×$–‰Ôjí\\MÑ­IŠÕŠñ,l-ìSR¤<”©	†q”î‘¦¥M§]k˜v	\0år¿$íâ\0Œv‘šÚ¥ál!âÂqööæğı¼ƒ}|÷@?N„V~!¥Ğ¨’\"Ş+XC¹\\¤ğxqñ”ŞºŞS&a_–2qD«L´1Ê|‹Í¤L&/I™À£LnMer¹tí7o7~ĞWú/\"FaÁ÷ó:{ú	}}Ü\"8ÎNM\njJ$Uh„ŒıGØÔ¾ƒé‡ZWËâå\nWº¹»ºùòİ\\…AÎ.Şn5îQQ£(¥S¡†iş‡ï~¯Ê\Z·×¬ı+6¤ŠQJ•\\ÄèJ¨ÖêõmqAÎŞÂ·èËG|5ÔÏÓ·{½ÜÂªe8{è…`Ääøùje¶Ò~\ZÖ+ß9ÈÙÛÏ#‚ã ­Èğ9¿À¿K°ú@/cÎ¾®(L•µ¶Hkæâ:º\\ÀâæãlP²êSuß¬ë·jO|2„Öwİå:p$\"ºëEjÊÊZ×]:¤ºê«·®	\'e\r2°|¿,ƒ—5’€!ù’|Àé?†3p–3XÎ`9ãƒœÑ@?Æ\0ôKâ„¸Z?j’ˆÓZñô¸qèÎó«í«ÑHU)ã5´İr\"âÕ”J(•0»ÒXæS4Z”ÈlU­EµF(§4ÑJíy±Ši(I„5g˜³w°›€ceÉÜ=PEEIÚaäÕP*K-”m8– ²ƒ\0;À¤¿è/üıAô®%@€-Ú0‡n;‚ğPÌÒúÃ¤¾©DJLËo°‡Q‚v¼t=×ÕÃ(÷ãzX®”P2µ®£İÕèmÃßïmú¼Z”@½ÛÅ5ÚâB›†3}}H‰•*IÍ(ãÓÊrßŸöùUKU³0]que$S©­ŒÔUD¾­¨Îæ@ŸÀà`.b°\r:À6ax¼\Z¶Ç0‚ĞÙøeÙáñ…zmQä²¶ÇÚŞg°=mÕ\ZXÃ¸Õ¾2Ç-ÔS$°Òõ×Y0FÁÑ»8Ú;íFë†:XŠ$r©ÂĞĞ?p2˜\0\\oPf€×Ö»„ŠÑ¨¤ñrŞµ¶­GP`\rw§}\\Cv\0Àïw}˜ ’I%ºqF˜æ0şéÃTóL\0#ê•D4*¥LF©j7€ÿ÷÷†špœpÆt¼fMÕu“LµÕ8zWeõxQ8Á…šOˆ¦¹¬À8—EÓ	M ‹ãA¬V 6\0Mtœ •UCi0ı³ ¢”vb¥¼±…€J°¨úï Š\0 ÔÎ$ÜÏ€ªr„0‹ªÿªÓNú€DMTADİ³>Z5’}`´zê¬î8¡Ia@:\"PS\Zg\r]n$Ò¨›,MÛ0Ğæ¥HRw\ZÃAÃg0`Z\Zd\r¤K”ËÅY;`íà_c—@µCZP­l .†°sPìÔ9Å˜Ë‡&Ÿ´çéî`QÿœËó,Ï.GAD—Á,Ï³<Ïòü;<ß@‹ ,Í³4ÿï¡yÅ´#Ñú	ç5\Zèá8Qïd1‚},Ö‚ÕUƒÿƒâ¦5èaBëÀ£ ÿßÖ€á\\Pçô`ŸĞ\Z\ZøÓA @½C¢¬5°ÖĞdÖÀp}P;İø_5KIÌZkŸÏ*PH÷DD|«hØo\n õ§¸²VÁZEÓY†´V×Êt…AâLWXé¡¯OqÕ\rÛhGŒFIUrJ\"i´Ù®ñšha•¤Ëx}+‘P—K·b a´H]#Vw|¬¤ú¨FRì{¶fÃÑ;h6œ·6D©ŒJáAa1„Oº£PT‚×/$Ã‘|ËšÙ³sÔJê}Ù9Çø»Ú%Ã1®>ša@”?ŒOJ\Z…{)<Â†H]“‡|Ê×ß#	 @©JªCŞ©ıí~cóİQDY*`©à3R†ë¨\0b©àÓPAÓïi§\0àÖ;şÈ’KMG„>]\0®½\0TwÚL¬JÉ¨£q	d4Ô¡Ï0\\‚\"ôª;ó© ş¯·OCÀşÏÙçßÆ	ÒÃhCÜ  F0†,‚Y7Á0\0€nÙø¥F\0v*ŸÊÿ\"§òõü¡ÙüêK\ZëfàŸaü™%é/Ÿ¤1®~8œ%i–¤Y’6HÒ\rô¤af\0–¤Y’n$Iƒ\0W÷8Rë! ygd³:\0¤I©‚YÁãí°#Øø}ªÿé8Ï,ëÅ3êíDÀ¦Àsƒ‡¥aY<³xn4ıš/HíÑf´¾jµ3PŒ¹ VïD+úêZK\'V¤`ôëC‹åÏì~äÊ@t;…B5¥ùTpnBñ°¨{a#Ìğ¢@ºzÈ¿ëùG0GÀzaÎlĞ,!4l–tQï)Ğ)ŸÁ˜Vı>º…Õë3BĞ¬¨3Ú07ĞcÆ! ^FfÁÌ‚ù#ÁŒ¤ó;cĞ;¼Áo|‘ÃoÉ¸ş•kµW5ÒÿÀQ¨Ş‘h–²YÊşXÊfÖ\rÖ‡8KÙ,e³”ıÊn —M€hı³”ÍRöÇR6¦~­½HÎ¬o`Áim¤Èdà2êê×™VÇ‹Åtm£âµ)¹£TJ9³Õ(u‰·±2m®XÌ|Fê6êøÈÑ”X›g«¡µÛh\\{;ct†§m8`uºí`*Q$•QµrpkçåêV«®ùié\"¥t?H%Jˆã“Äq•IÅZÆe\nIÌê”’ŠÃ@[·1Ù.’vçæg“Š»;’\nbâÚVı7Ûö¶ç·»°ÆãÄÑßeí¯ŞzC†ÛıÙ£ebèòÅ³¹\'Óı!Ç1{|½`Í\Zê¥é°¤ªxÊ°ïIàz|û]÷¬I2ôÚªù%Í‹KW¨;*Æ¿üé\'èÇ51´@à9W£yûÃ–ú\0$ù¦l2ØM\'Ï•ĞË…€iÊƒ¶aßŒÄâw·étùôĞÍmÂûØ\r°2îu%±„ïa+\nyª<b~0ô]weySN‘M?»Î!rN{şT°ïÖØ\0ÒòŞ^j–8æy«~v±Ï«n’–Q¦“gí#Å÷ÇÅ¶Sly&Çe]·¼ƒªlOÒ2ıNÚ3ÍZõ+XÑóØ£AÊ;Ç}ÄÇe•só÷m\\Øe¤?d®ŒT–“\nİ7]ŠÍ±Ê~²sµ4;+ËfE³¥.\"§®İ*uğ[®¹^Ğbm7^7ub†`¯:4Ù…ò\'?1¢oÈ´ÙsZˆ¦ËØí}ê7ÒòşàiŠ1Îé7šßN¼y/`ë•)“/o)ê9}÷lÕ7Ë{½HqUq%$@†ïkŞÓ$ßRôıÒã,ï±½ÜäçŠó]ğyàÔ£>$°Ş¦l_»‡·‚\nªòŠû÷°	´)‹ÅÇü²ìì”ÄCò©ß$Wâ{S7Ì°­(#Ué¡c{t§dNx×í¯¶›ß?ÔcšyŸŠŸYqóŒ6ö\\3o?nß‰±¡÷Úüœè”?d\ZF†ïñ\'¥Í\'ˆ½ØU²æÒ¸g áÔjËÍnG™–¿Øú=k6ää¢Š~æne¥ÃGd­Şú$-14=Çl;´şxÖêğ<y®CVÑ¥%óM3gnÉı³äÕiUúÔSGÌûßÈªLÚE*2\\üŸÃÃNØzoh½ÁÔÈ1~¥qÛÆ«İvCË–Oø6à·M:OhMèíşd”pÅR‘Çéôpg·Óµ…ÅÂÓ$y\rŸ³,æû¿~˜zqé}äqÈ²E¯‡;ıQqõñ²Ğ¹›r¢ÅfO½:ÀÈØÂãm–ı%Zvü|¡û­•Å¯G“Š‡óG·5)ª”µ?4§gÙ¡Éü~S&^úzÑüÈW§ò»ß½{;Éd¤çƒ¹GCÛíşIZ_şó¡KÅ„Ûg‘*g“mC¡ÌS{M&—ğŞó‘ş…$¹´ÒcËˆ²Œ˜7—lûÎë„ª7x\0£¿^ÑkÏ¹¸ò –7ON¼° MÆôÌ¥ÚtIÍùi”ÏÒcÎ›˜¾¾ûx“÷¯oãÇÜÚ5âJ`‚ÉóƒÜûäİüálNàíg?ßsZiâq¹Ìùá°â‰ß&¼Pî:´ñaÅŸ<>/-cé…iÂœÉ}\"æ‘€yxkÓ°\"^‹£L=óÒÄüM¹Sv66éö@U¢Îü†W—àÇGM}³ä|qÙác—&|“7x•ti™-İm{å´À=Ô¸¨dá€™^UåÏz“ªÍZï,ø~\Z¾ãqYÖ’||rÆ¯ÒÃGV,$-[g«Ê_íı*nkáèW|·Ş\Zé]êş«·“Ç\'‰ÇŒ8UÊE:?Yã´Ñäüª¼òÑÔôÙ‰è‚3ÓIóÛ“ì•|2ünNyrE»çW&®>È<õöş§\'†ç-k‘Ù|Şä¹—ÇªºŸX¹¦3´vØUënÉ“òwUş•65î`ùş¶ëÌyùüÒ¢¡q‹÷¥¤•¿:\Zl<ÏáüêÃ¼èü óï9¶Üz(i‰›÷‚Ò%?§E,nñ x€Äæn‡e¿÷ßÓ½´¯xnLzÆ­İù;.W”¦_Q_ÍBJîvñ9`§ôÇñë*öì{ci)Ÿ–—¾}’Ói^ìøâÀü’Œfı—özÔ—$ÛßIñ[Ëşdx_³ëËO,òvdËõÊ_Üi@)¯]âè¢ô¶÷º]—c–ÚN`}#`F´¬Oç¯4{yÙ/~³s[ìíNi/\"gñ—I¤å 	Vkó‚c*wtj-œÚÿĞ‚¹¿·­\"¾±9!ÊjWt¸i´ädÕ&låáë¡û«NM%Éô×¯4>¦éãª==üb@àVÙ‹ÈÛ{ğÉ¿÷´Ù.àwÆ­—O”S×Ï)ñ.¿´µâ¶*ÌÄiÑ†İA‚±WísÙÕ²àŒÂ6û’ŒúşÂ’qU£Îwu=¹-m{ñ^Âk÷ô>U×q•ñÈp32<íúÕŞ›‰›¯“á‘^ˆÔø…cß”~gºüMÎ¯¾Ñ$pÎX¼~ò\0°¬C³…ÓÍÆ_>g°ké÷q`¶Ôf½oæä ŸA‹{ƒ+M¼ºÅ\'¯é2ÛµrÑÁí‰>$éÊßq©ì»|úFgãÅ›¯^‘Ü’;kàäö¡¥ßè#vœnß8vi“5¿}ª‘mnkXØ—óõ¸`÷	QÉâ9¯¶HI=¡8Œ÷fi*CúuÙœp÷Y˜Ê¨Âsü†¾æ©f¦0o~à™¶yÈù	VÑ‡Š“g»Ÿ&=asjÙ„’#c\0‹íø#;?£[Ò»ıÌÅOÚœ“t-‡øÈM–ÌğúÛépºÏÌO	]ùİËŒ¶å¶½=h€ıìğkš›âN¾Îã¢ñ¥“7­ÇG´MX¿ÈeËìû¿ÇìØa:O~ mü)Ù®Áš‚Cû7„]õnk4<ªÙ°^2I^ èã’<Õê›iê‘	&ëFWt0k-ûqsi×¢“;]ª¦i(ªuQÇT|5AĞbëlÌa@şé!¤…f#5ÑÚ´CZÜw¿’À.×–“æ,23Ií÷Ë·è”©îı:»}ıcJÅÕ3FHj—ñ¶±ï©æ7Rö\rÍ˜»>¥Ç.Q	˜³ ªyÉÓq};oH-åB…F÷;¦ô†{mWŞ=ÓvT×oùòZÎ4ªğ§*/İT%ßOxr+?`ğ¶y\Z¥æDÄûÅqÇÅ§ï{ö	òí8ôàócE^y×ŒÖzns(¼–b?^ŞüNç/&™Í¹ÒÂE™>Ç§mË\'-[µM(³=«¼ıÜÇ—¬Èğ_Ïm¸>üq…CÖ”ÇV?ŞOÄÛÜp¶ê{oÂZà‡¸¸±v{·o/©$½Ävû@ÿÍÖ·wV/Èíbå¥Øb“y%—äç&í}ºyıˆô“ø¹%#:Î™9!!m„µYf~ùÃu+û})ÂSÜtt€Œşı[stÄÜæg}W=ßœó4pË+ÛG(Ú}~‰\'æ#ÆV^ö-Û</èhóâÃÍ^Û×!yyg[äÁ²íVÇLÏú.skÖ&ã–æß\"ÓŠærÃ2£ÏØóªKî¶gÁ¿Ì:;Ø»÷<ï]eÖ²=Ç¿Î…Í/Tœl^ÖÙa÷¡pËŞ%Ìçr×!ê´§\'N·Ë9qÎvÊºßî]_Kìº¿Ğ©Ù­ãUUfQ3½×Èúl86CæÿMR‹G$páÌšÌÀ¯Sıš¬n×ıÀœÅİ_š.îÕ\"£ªTvaè†gævù¹¢Oõâ @¨ş——4]¼CxoÆ§~ŒŠÖ>_´ƒú\'KPÖØhÖØhÖØhÖØhÖØhÖ\Z•TŒ\0ØçÌ`cƒµ/<XÃô¯lCkecât¨ìïêäöÎK\\nAt@¯Ëp\0ì@pQ‡\0Œ²ä”\\IÇqrQb„L@ÌÅª—‡£c;°±Ã\\ÆªŸ©ûU[Mù®Uıì6Ğè7qs\rä×3‡R…H&M~OîÆ¾bµ\ZO\\\0ÁôxÂ>3\ZH¨àÄâéßŠ\'fåIIù?‹s»	','2020-11-03 17:44:56'),(5,2,'audit/request','xœÅWßsÚ8~¾ş?%ÿ\0‚ã´7ç3<ÌÓ¦3a„­€Sc¹–iÒvò¿ßJ¶$´½›{¸ÆZí®v¿İı$¥w­ïÔêYò]ŠèSù\ZYšõı‰ZºfÉ´Då:$Æòubu5í\ZäK.ğç¦å£ÜFo3?°µ!´”™ZÛ’Q´ÖÑª•’¥\\>w\nZã¬RÓÀfB¾%iŠÔnK“ÎnuıZ\Z\'ÙîQz4/——sÉÎó¿Ç«›¤T»í^«})İŒÂÉøBJ“OX\Zâè9—œMA¶X5õ–ÖêhNëÊæèIm%×áG$+á|%ÅÙºÜ0©aÉ]}\\BÔQ„s¤ğZ}Í­ºB®à,\"q’­E’ëoI~!Å\0,ñ3İeëäÊ\0]Lw~éõç·ZëêgüÃ®\"m°Â¢+ÇË´äŒ(\\ÌuŒ}ìå×¼’±ˆŸ$BeB2õ’¬N„É:á‹®†?‚9MKUï6«ûõ*¹K“ì~¯×xÅq´Êà7&[’‹¸r¨éeJI>aî¯\rŞ{ØŒq¯×Q4İŒ•+ÅŠŞ‹.•¶EQ\'n·£ÕJø¨Ü‘â1•œe\r¹©qóXúã.D¾z¡BqlÜqí+¦\\`”*I.ZJï-CƒªC	Ÿª˜æ$£ø E;u‡¾CÅ×\Z!»)µÑ«V”*N…¿b§)yPüDÀ÷‚qõBÕ}ˆ°ÒFa†d‘SW,¬+ÖÖ_VìZŠ6¨ ¸|»ŠÉÓ`Y]İSm68;he¢¦¤ˆ÷*sÁ“{ıXwO\nq|\\TN#²¬Ê`Ì\\œ‹+áh{@\0€L).Øè\"‹óœ¸Åå†ÄüDKùó°$¡ö=z”¯W–&³A	Œc„„•=¡sí\nf¸N…í²\"ê\rÍüIâ¯,N1ˆJá/f\0@Ğƒ€ï¯~ãä“¡-–Ù°)¡òHsDé)âå†Å×l½zâÎ!ô>†™Ç±Ti’ÁÂ1­½Ï*ïÚXŒÎ‘ëc§\'¾œ»Á;7àZe…Ü¾¸N¸œ‡v¸˜×ÉšQÎ–£\ZıÓTÛ­µàiİiø¿ñ­ãOC89v§ÃptÄ·¬Ì<LÛqÜYxÌº†v´¹t§ß÷¦ÃRïsƒ±=. ÷Â¿fmêØÎÈ]²ü	…fîÏ\Z°ÉÎ¼¡7ı¯T,Bdc7±§ËĞ¿q§ÿ–Œn—?xo}·Ï¾N‘)hë\'´Úx\'-f~‘¾aœÒ\nüĞ¯©eS–¹(ÛE12§¯ÖrµIàÚã¥7;#0»êG]lU(¡Å~Ô/8‹I¡®(MAH©¶\"²e_míh¡ò¼Uúlİ,÷ü£Z®ê¥şåÜNaĞŞM=ì\r¤wıİÎYã©F«Ój›ÒY¯”Ks~IJ¨”\n Íàv•Lí*ì_	2\'ùƒPtENûÍ[Mí‰ûc¦ÙëÙışË>2Ÿ)½è¶¸?tO;0ÄÑ}ßYLØÜ¾Ö£Éëõ€W¢ğû×ÂqÂWA4SCF·!4›;ğnîjÖ¸bó—\'9OªÉÖ—a{‹h‰‹?8<Íc˜áïPÒÀpxU“,Æ­|“?ƒDÀ.:šÑÑÄñÍ±Æâµ~#Ğı#]_C;tßÛ–$l§ê2Èvè©z5Â§Ği¸MR£u\0ğÄ\rG~ÿÙC€ÛÁ¸¸‚š©ÅSHßÛ.ïg!ë\rZ\rRàä!ˆl6šŒ§¸â¼Ğ›¸ËÁØ·!Èæ.+£{iÂuÕiàÜ«²?;{¥*CT¬¿ìßF• bŠüµÍ9tÃ£ı\n!¸d½åßxî^É³f˜½¸æî|îùS!{úá@|','2020-11-03 17:48:05'),(6,2,'audit/db','xœíX[oâF~çWX~!T	ÌøÎ TrXgCKp‹¡«JHxb‰»¾°c-»Êß›‹)&mÂn¥F alÏ9ó}çÊ±1‚èkŠ$F$Mñ=IÅf—_¤°Ÿ€NŠd\r‰ÎıA¸÷ûB×îop=´o/ü ›’8£KWì²¯ØAbŠDâ2&şİ¤›D}„>-]rI¹ã#¨E‘TÍP›\0( mt\nhX@c¤r‚\ngAHD¶£¢\"±…çóÖ#‰ı„¶îˆO¾÷q‹ÁH9™VJ½–ÉÏšó‡y®„Ä0ˆ	•$­“[<[Ä^$1_‡Làd#|Ç{ æw’â4Í%ô’!qL6ªL3[Îsj/~;OOR9’lH@1:ùåÎlk¯s¦.Ã·äÌ¶,)€;S/;S×ºcõ­î¨&°ûÑ[¸M·kœÑĞì\rFÓyk¹‚é®—ÄiFqgÓGÄ=ßÕàqØ‘Q\\!9´®­¡5èZï¦#óªo•t(™JbøÓŒ›ÿ¼ödI½Œ^+r#ˆg	0÷Õ4ÍıºİnÔ3ûÓ­ÑÎj?Ï­ıb÷tµş\\s;æû	NS°9ç³üXí×®92ûö{W¸Ìª×ìáf‡³g¶è9Â€ƒ9x÷Ìf+©F¾eƒ¹Ó½±nÍJfë¥ÃÊE8*Tó…Ú‡æïÃû^\n>f¡Ç)9kæ\0E¦TIÕ¶F—ÓéR¨—šA}¯J±#°\nÛÒê\nÿGÑxÏ0N=ãÔ3N=ãÙñÊ9CÕÀ[š3 )F>g@Pn\ZPcğ½c\rG½;«±L¥É\"cu+¸‹”ĞiàóÓ`Îø/ü™ÿRÂ¼˜fÓˆdI¾îQ‚3â»\rá³?¶á¬¾H˜I+Lîƒ¸~gï¹P‡ºÔ”@4!»ØßlgÄNëÀ„@˜¹Š€Zoìÿ\rÈû!%Ÿ‰Ç(WÕõ$.\nªªÿ» F‰OÂ´ˆ­Å½U`æİı\0³õ?’¿GµdË«“É?’!ñêˆ-wÆå¯êûôÙ˜O7¬ÊÈx\r6á`“lR\0M¶@Í‘~@ÉºRiC‘£ßÑ„Jå¦³™(yˆàÿ¾Ü¶ôeå¦ª*”Nåv*·ÿ Üt	æ1ÜyÁ£hë‰Xøiõ*‚×•+¬F~‘Ï•—uÓ0I|ÒPÛìqşŸ2^».öÉÇŒ‹¨p1§ÔºbŸĞª‡Ëä$Şó-46Ä‹äş½`ı‚Ü>Š©R‘œÓŒiŒ™êÕr¼òş^i$®¡&eR ¼(‘ecÅ=êd4	CBÓÖ¸h‹İÍ­*â@İ\'.©UÄmjE8ä¿Nbƒe‘”¿Wƒê÷Iâ×¾\ZPuı”Ä§$~]«\nïÄOOß\0‘±Qt','2020-11-03 17:48:05'),(7,2,'audit/log','xœİXënâFşÏSŒØ@ÀwœA‰ä°Î†–@Ê¥«ªT0Ø˜±YÛ¤¡ÓGè3ì‹õŒ/Ä“ì*İ?)fğœ9ßw®s‚Eü`—4ÈœÅ&¯°ĞâE€e\rW½èrÔé V¯3ºîĞe¿w¦dm³pBİĞßL‹M†EøUàW‚s’ˆ‹ÆÆölÜò–KâÚ^SÃå¦EMPIÕtµ&’\"ªÑaÂiÅTÎOÁÅ[æĞ\"hTT\\¬“Õª~O]Ûóë3jÓ¿ÙÜ­ŒT¸Ôßª|U[-VÑ!\\t˜K9¨$iÍÈàÛµk…Ìsù¾s\ZÉÌ¡kA—„¿$Ë!AI42†¸.İ…“áfQ“p±z^ln·s3$Y‹„æ–»$ãK|Ò[Q—¹sôşY;u-7Ág/¼ <›[³‰=kÚ3—,)ÿvàZ9‡Æh>â\\Yÿ¡œ+iªÆ«eÛh\0úÀì˜­aÁÏôÎZOkÓV¯;övw8é\Z×æ4Ï¡O˜N¸“§\'û\'xïI;ë¥›#Ù7/Í¾Ùm™ï\'Cã¢cfÎøô–úÔµ¨=	¹ù/Ÿ>€ÌÏ¢âºcî­ç/	÷Õ$ˆüú¤nØ6:“\'£‰>kZø¹×î9û‹ù{Êa40>$$8MÔëFœËÑ3ß¯-chtz¦è,Êßëõw\ZÊ/¨hP—7\Z£ûşe‰T%RYáÂGB>h]™×F.³tëøá89G£ÂÇ+ğ÷q½gÈ&zĞr%6\'ˆ3%Oªğdt6ÎP)ÓhK‡ºrÅŞÖUQ•~ –¡¢$K¼eœf[†¨z»;0ûC¡ëíßh§¾·¡jÑtPÂl¾d+ş$ŸÈÿô)81\'K\Z.¼hßò)	©=­ ßŒÎÈ ri¬‰Ï¼ºãÍ™[:‰r÷•Ä†T“„šPá\0/nzƒ!,K’ 	UQ¬\n2kj©òâ-”>Pç†T—µ4¤ò±ª¯éÒ³©Ä‘5¹³rÂÎ=/ìä>iÆ–(äïiŸZo‰l|³~Oşjã>ÌBşUÖ\0€S°1G`ãhütÔé;T˜ÜPrmˆSô´ãL±5Eˆ‹M”ö&ÉS\\ì.rØ’…(¸c«µ1âµ…\\/DPsj#æÖçºœÔ<8&¤~0æj:\\õ1Q¸Ñ¢œñrçUÓ’¼ğã¤\")ñ!ÊY’Š–è§dÊåü¦(éöüKtŸ•,â;^ğ¶F«ê§¯¥\"îgMïBŸ­—qpBõKæÚÔÏ+B1§ÇB±yîAøE}Ç;®¿_cÒßP~obªää*çt\'Fpôb3J|Ğ=\\L¡Æe£|S­ÉzÂfÃĞ÷ò¬>Šwk÷*¸ —Ô<â=ß\\æ¼‘šÂ:/3=ŠÅş ¬jq$ÿ¢³ñU®Ì‹®â?3’›y(2zí—	TÜı—f{°B_ç0[/Bbİ!PcQ\\x\' ?` æ–:(õÅŸºqFİø@]õœD²~;ÂôNDÙ$Kï6Œr¨Î¥zÛå¾s)«\nFqœItOsğ	ñ}²)üy‚¢Ğ,½¢yßÆ²¨ ˜»’ï³¸Õsí~dáâ†ød”Sù„kÏ^;4f-éYíY‡€î¦\\Jg†@9\0ñ®«•Ã,²s(ÈY~àùp’©¯XòIÖµ‰ç]f·z¾€&èÀ}JåŞìmåT2y]H-†ävğxˆ-²ìé+x¾4Ğ#”•»M;±˜vbõX¨‚×5¡ÑPï\n]•E]‰\n­‘-´S¸ĞË¢A€BÙt¶†ûËG,€µËà&³×”ï´o±mŸËÁÊ<Î\\4\\P”Ìü?1P±¥âÎ¤Ä¬Ó¤QsÀ$¢Ã¬lİÅlrMƒ6¥æ˜¦i:tívû…ßÀ=','2020-11-03 17:48:05'),(8,2,'audit/profiling','xœíXmOãFşÎ¯XùK ‚dwíµ¨d‚9¸†¸“*EŠ{	îù%g;èÒÿ½»vBLãpåå*AX¼³3Ï<óÂ¬]*ÓoU©±(I—R\' 2\"·ÕNF*åAÄ¤OaªmÉkª¦c,s]œË2wÆ2©ãRé·€b¾RÅr	‚¨dÍYÄ3p~¼$™—ILA´Ì¾„ô6ÉòÓ™7øÓ?İˆ‰¿ÄtØ\n3Še*-ƒ`ìOÇİšpÕf©PQ0QuÒ„+DæÏªÄâR\"\\å>İ!÷‰/	•Zî|Şºc±Ÿ¤­)óÙ_Á,nqCøÄ]øAŞÊR¯eˆUs~;—JNÂ fÂ(ÆjÉÁÍ\".ğˆ}Äf,ºÓÙŞ-‹\\ñ”[òB7Ë\n	­Æ••ê|9/ a*ü,uîïJ„%Y–5]éÜOß]ä—±«ğxOìêH‡º`W©²+ó²°/­OàbÔë®Õ]÷mp1°®SàŸ°8O—Îv²¢\n†(rcŸÒ/¶*¯m2Ûú»\"C¥ “¼†ÌMn>LMFï‰Ì¶Œ(ÈÔªdj\Z·n›=³;<\0üËùì-œ¦Óµúöp`\\õ‡“¾qm:À°Ã›B–§nçQÿÎñã\"¤ÃE×HÌs`ö»æùdhœõÌÊ™”İ°”Åó\'¹pÿéÓ[&+Ç«ÖÊÜâ›$\\ÁÕ$+xİ¨^½ÉÆi{¥Ïs>ZWıg1ÿXcÙÆ‡XıóañYÏk×\Z=ëƒNCõ{ÖàAÃá*®lĞÅ`ôÏŸP¶’:*T	á!·»—æµQ‹l½µûpš£ÅÆÁ§KÎ÷n½§ÀwyèİŒ•î”ÊL©“:Ø8]M§SĞ¨4ƒÆ¶®Z±W6`‚ÚøõEüGQEÏĞ÷=cß3ö=ãÉñÂ9ƒ¨ğ=Í\nT½˜3¬6\r¤róW}ÛõxVã™š&‹œ×-pK\'/–Á\\|ºº_Åï”q³|±ü6)ö½”¹9ó#ğ»Ñ™68l,²…›I+LfAÜ8.²÷4†›˜_=›ˆ?ƒüÁ¯–=äË† teÀİUt\nIãèéKã*¤ì+ó8äÚ ê²¾Äå]A%Ú¿j”ø,ÌÊØš‚­š\0sv·Ì÷3÷ı3ª_Îx5\\ş\r˜—¤şØ\n2~,~¢mÃçc~ú€ªê€Ì\r¯…±qal\\\Z\Zoítÿ€\Z“5¥Ö‡2GßĞJ+å¦ñ™×y„ş÷åVÿáûåFAx_nûrûÊMÃ¨˜ˆÑ£<ŠºˆÁO«W¢®°\Z]ÄÅ\\yÚğÜ4L²WŞ4H›_ç¿—ñ\nzL±Ï>çi°ˆJŠ¤ÖEû,­ËpT31ğLNâ-n‘ş\0¼LîßJÔÏÈíW!UjA`ºá\'FüèÙr´b«4!•Ö¦ÆÂÊ¸´ò¬D–õv~ÕÉÓ$YšµFe[ì><ªÉ6pLê€[©¹AøJüë$Öyáâ½\Z\"o“Ä/}UH4mŸÄû$~YEtâûû¿¡€<','2020-11-03 17:48:05'),(9,2,'audit/request','xœÅWßsÚ8~¾ş?%ÿ\0‚ã´7ç3<ÌÓ¦3a„­€Sc¹–iÒvò¿ßJ¶$´½›{¸ÆZí®v¿İı$¥w­ïÔêYò]ŠèSù\ZYšõı‰ZºfÉ´Då:$Æòubu5í\ZäK.ğç¦å£ÜFo3?°µ!´”™ZÛ’Q´ÖÑª•’¥\\>w\nZã¬RÓÀfB¾%iŠÔnK“ÎnuıZ\Z\'ÙîQz4/——sÉÎó¿Ç«›¤T»í^«})İŒÂÉøBJ“OX\Zâè9—œMA¶X5õ–ÖêhNëÊæèIm%×áG$+á|%ÅÙºÜ0©aÉ]}\\BÔQ„s¤ğZ}Í­ºB®à,\"q’­E’ëoI~!Å\0,ñ3İeëäÊ\0]Lw~éõç·ZëêgüÃ®\"m°Â¢+ÇË´äŒ(\\ÌuŒ}ìå×¼’±ˆŸ$BeB2õ’¬N„É:á‹®†?‚9MKUï6«ûõ*¹K“ì~¯×xÅq´Êà7&[’‹¸r¨éeJI>aî¯\rŞ{ØŒq¯×Q4İŒ•+ÅŠŞ‹.•¶EQ\'n·£ÕJø¨Ü‘â1•œe\r¹©qóXúã.D¾z¡BqlÜqí+¦\\`”*I.ZJï-CƒªC	Ÿª˜æ$£ø E;u‡¾CÅ×\Z!»)µÑ«V”*N…¿b§)yPüDÀ÷‚qõBÕ}ˆ°ÒFa†d‘SW,¬+ÖÖ_VìZŠ6¨ ¸|»ŠÉÓ`Y]İSm68;he¢¦¤ˆ÷*sÁ“{ıXwO\nq|\\TN#²¬Ê`Ì\\œ‹+áh{@\0€L).Øè\"‹óœ¸Åå†ÄüDKùó°$¡ö=z”¯W–&³A	Œc„„•=¡sí\nf¸N…í²\"ê\rÍüIâ¯,N1ˆJá/f\0@Ğƒ€ï¯~ãä“¡-–Ù°)¡òHsDé)âå†Å×l½zâÎ!ô>†™Ç±Ti’ÁÂ1­½Ï*ïÚXŒÎ‘ëc§\'¾œ»Á;7àZe…Ü¾¸N¸œ‡v¸˜×ÉšQÎ–£\ZıÓTÛ­µàiİiø¿ñ­ãOC89v§ÃptÄ·¬Ì<LÛqÜYxÌº†v´¹t§ß÷¦ÃRïsƒ±=. ÷Â¿fmêØÎÈ]²ü	…fîÏ\Z°ÉÎ¼¡7ı¯T,Bdc7±§ËĞ¿q§ÿ–Œn—?xo}·Ï¾N‘)hë\'´Úx\'-f~‘¾aœÒ\nüĞ¯©eS–¹(ÛE12§¯ÖrµIàÚã¥7;#0»êG]lU(¡Å~Ô/8‹I¡®(MAH©¶\"²e_míh¡ò¼Uúlİ,÷ü£Z®ê¥şåÜNaĞŞM=ì\r¤wıİÎYã©F«Ój›ÒY¯”Ks~IJ¨”\n Íàv•Lí*ì_	2\'ùƒPtENûÍ[Mí‰ûc¦ÙëÙışË>2Ÿ)½è¶¸?tO;0ÄÑ}ßYLØÜ¾Ö£Éëõ€W¢ğû×ÂqÂWA4SCF·!4›;ğnîjÖ¸bó—\'9OªÉÖ—a{‹h‰‹?8<Íc˜áïPÒÀpxU“,Æ­|“?ƒDÀ.:šÑÑÄñÍ±Æâµ~#Ğı#]_C;tßÛ–$l§ê2Èvè©z5Â§Ği¸MR£u\0ğÄ\rG~ÿÙC€ÛÁ¸¸‚š©ÅSHßÛ.ïg!ë\rZ\rRàä!ˆl6šŒ§¸â¼Ğ›¸ËÁØ·!Èæ.+£{iÂuÕiàÜ«²?;{¥*CT¬¿ìßF• bŠüµÍ9tÃ£ı\n!¸d½åßxî^É³f˜½¸æî|îùS!{úá@|','2020-11-03 17:48:05'),(10,2,'audit/db','xœí[y4Ôëÿ?Ù]Ê\n);ÃŒ=4DYÇ\ZÆ#ÆL1˜¢²&ÙeWöÈ¾oÉ\Z¡Èš­…ìKö’(ÛotïıŞû½·{Ïï÷ıïùó=æåı~½ßÏûy=ÏÇëJ^Bş&A^V×C  ì0^”¼´üM¬¼Ä¯¿@òP)y^ÃKnucmmnU„¶±®!·ºB‡Û\nåjƒ%ZÚ ˆ(+^…ƒyXyYé!Iš\')!ÏëÅk êäèˆÂÙÈË»¸bğ#¡\n6òÒLRJZVJ\"-‘–&µÃH¡?{FÉKàƒÉóÚb0¼$‹R2ò¼â(ggq7ÎÆ	/n±ÁÜÀÚáÄIn$E¿c\'àÑâN6‚8ü A\rGÄ{ˆ9Û; ÙrÀâ0ß¡JÊ)|ŞÖ‡&bpı$ÈÖ(\"Ú^GÀà‰ß}Êó¢PÂ÷nØ#úÅ(ÑÃù;@Iy^Q%^ÏŸ3øGø0¹ÿ|m\';#ŞCül)™ &¹EÙØ¨\0¿@ZŠ?Â†’Òö«/pà|÷~Nø-Mä¿)\ZØŸ£‘–çÅ¸;;ı9û’r?ãş>	¿ÔAIÊAeIŸ_ÃùWË[Nú_*o’s‰Ãò>,ïcyÃ¤¥¤!áÀ~_Ş22$†jÚjªF?q“>V×Ğ®VbVª]C#¸†®‘¥.\\GÍŠnÈm…vÂˆxG´Ä¡1V\"ÿ<ã`güÓhWGÜF\Z¨©«¨éªª]°4‚«h«ınc‹ÁcphŒ%eí€ùûÙrù»é¿÷şÓÏ»‹³uÂ;¢2mI@ÛcQ¿™3Ò€k[ş´á/öĞV?i\"4tÿb®–šÙ¯Œ\ráq\0“¡û³À÷çóª\n7‚k#.Zq+~wôã>„Á?,ü	\rCnİz‚ë^øc¿ŒünRğ`ğ_,¹¡ê%5ø‘ıÚõ×“^LıŞñ“É%R¾ÿÚ®\"÷Z£ÁŸÃùÙÁÏ•ò£Q?ıôïËI‘›ÿ7zæÿ³©úŞQä¤%ï(‡$şï$q)Lö;‰K’ø!‰’øßø¿v—ÀHütHâ‡$şo$qY˜ŒäA82¿\'q))9’K\r]C5#nÒnBüÓû%‰90©±ÄÚX‰p[Ø>ø‰ÆcPDÌ÷¦ïÃ¹/ÃµÕ¹$E~Ùâx©Ú	D~Rƒ$D\"*!!\nrKÈÈÃdå!RÍîI­&c„·²Ç¼\ZöXN*ŸIfÛ¿©\n™9(Õ¹#ìıYĞd”¡!úIö•Û§Æ1Í*z¾ŠúÄ›Õ¬mÈå\"·ÆÑ]¾{®®,˜}²§2ü\nf6vƒ5¶ífÂåùÚ>¹Z»J-ä4—–ØÚWÖMëˆºT¹¤’§\"æ>ò]”~JÅP_^lÍ#\0h”®3³rªÀ ÿ©­JÃlğ\0N+ºçº‹HÀÿfEÿL<>>™ĞŞ½ÎÜø<?1Ó¨vùJ¾§`òhhsû–Šf4Â \'ç™äâ“tàU¦RqCöÉº‹÷fçX4ÏO\\ä¸u¦õMÍ$Õn‘ì	€Ê€¾?á$gæ\ZÒ³«°F¥h\\ğºDªE-:ixñ´²ˆÈGè(3f‘kº#@,´Y®{ù~Ø˜{Œ\\\\ ³ÛyÆ\\x™Kš\nÓ<Y1*\0@§k¨çÒÌp]Tià‘T>ŒŠäFJT®?s»üDHC\0\'¥²Ÿ¥–ñªtşö†Ğ­è%/–âaw¦V—Šq™³æQ!Õøœ\'0š\ZJ¨•b€óu¨Kñ°>l44V˜©5ø}ˆXl»š>àÇ=ÎÔ¤ØÊ‰œ<Â\"›ÄŒø\'¹.”ë¦G¾MÑ‰]h¸AÎ¢ââ0â²,œ€UŒ†Rs•]Tõv*mjsÂ,_ÆVšš‚ëİÕÖa€ä©¬ìË¿#¤{§Ñ:[ĞCo‡êÂÓ{›~.*ƒ%¯8ÕQ6‘¾†&\"ÂCC–——ÁÒ9iÕ·ji¨ƒÛû­ÌîYŒ\Z:JË*Øcfe2n\nšNpEßÜ5½\08—[\0Ğ=]VĞaÕ	@Rrğ=‹ıÍó\0âC£-(özğ†¬S$U·Î´ì\\ĞJùº^Î—şEñFL±IÜYŠrrx-U(Úß?V1À¹pôÇm«uï,—Ş€ïÚÑ˜,¡Ğ• Ôœ·ót½·Ù|V‹½¦¦£ÓEãŞ”°¦¢¼D¸ğ\\pr& uØ¡şÆd7Ïg¥€ûÏK±QMÍ…õ=B«oMC»#ÑaÙ€¿!©¶IAfœ‰¡¹st¤µZ·:é®[uÂp;Û6_}¶î¸€Üí7zWXybÜ{t»Õø±p\n¡*ë-ç–ıÌ™Øò¸ óœö;—3÷Îš\0·Š\'Äìğ±Í¬g§V	·K¹Ä¸7½›m^w¿°(»Gî½CÎx‚öÎ)Û•€,iï>Z—.³[l$¢bƒ–)Í~ÙÛè’½ÁŠ‹\'Wvw¢ö|ÜÓ )h¿ø+¼ßº~Q[¯c\'#PI¯\0n§·8c÷Dàš„dv1Í¾RcüíÔ#…dÓÚ…‹äÆé­^â²!\ZéEŒ:ğK¹U€·ÃlÉé¸lŸş©Îø›Ã¨È&ÇN²hîûŞÌ‡.ª—ü½\"ÍÀg’_gÛí6›ÊUÏï¿šøÊìT1cL²ÁKC3\'&à¸»Æİbµ—Ã„–,i%ş¯·éÕën³v™sè,m£³Ş,¾Ùİ{©$™*X?OYÅZÍ¤LD(@Zú<ÇÌ´_P6œ\ZÊh_Üğ1y¸æ»=ÜœLîÒÌl?3TUÌKTXÃ]¹:Tm½øÙ©åyíC¾ñ¨›!öA!Ê²çºĞ	«\'õ^=%?Áì|Òİ8Z¤-¢ğV´òíO)Åäôõµ|ìb)¥i›¤¯ô:İ»{Ú×ÂRU8öîTÜI>Vz‡ìÉnó¹7¤è¨¹š³{±Õ:®\0²Öğ½öß¨úPR½k¢®®ö{ÛjxiìÙªÏ\"À#Ş`|š\'ĞAúÁ¦Pêl¶êÉºŞÄê—M¯ó¼`›eÎ¸‰msÄä—)+Ü|$¤jTĞ¸4¦Ëm¼SIÖ%G|–±pŒ<Õ6õ3cî+W(ÚËmNÕWÏ®ÜZùjÈsóÇÄy¦[ü‚\"¿?l¬ÿöX65wšTgöš31õâ1¢íÜêN3Â›Ú©j9‡¤çk^r·>\ZTÛP‚f­íğcO<ëØŒ{¤Îrè‘[÷œë(•ğ›¿LÏ§Î§óQQ£•Á6Ş’<³„),ÕG7ØàƒºÃváÕ\'7·U†W\"œ¨Ã+œ(YÅw¸£d3´L–(hÊŠ¼†[3^˜”¤9»7š™xáx¸§¿’(^ãÉÔéœ#j‘F]z‰\0\"æH8{ÓóèL¼)\rvğKª2ŞÒ;sëC§ƒvı«V\r›.!M—Xåî_Ö¬kïy°~×£È¿HKËWm~Î¼åÊ	>	Ë»Úã)6§o±2>¿É}|ö:{ë$¬ëÌç(mé<m¨y7á*#£¸×	âˆ\\”Ã¥óò_gw;\\+&d‰={<İY%\"è£`(®`8Ì^ƒŞ(\\É9[±İg^­óøÚÑ¤¾^ÒnPï÷õ¸öÄïMQ|Vİå˜]?ÛÅÅ±Áq—×‘¬ú\0ğÈU¦KÍ#W³N¯ç9Åî×´ØêMÜ¯ûrÒF£>ôŠ0şt mdsÖµ[3Š€n÷öu_Uî)ÜµŞ¤¢&zWî@`S˜İf¡Õ5,¡–›+ß1].’“ÜşrÓ¤ºÓ7oxiÂön¹]Õ¼\\³ëm9÷ÍN[á\\õÌmºS4OúëKq]š¶‹u¨É\n­ßy{—cvõÙö€S²M.(wy–@Ô²Œ4«Ôãû?äÄ?€{zk–æ(¸w¯8ØnÿbŸ{DWqj\0Jz¼IùØ!§:øÔü”9MP]Éî¼ õĞkõ¾hÒN!£K©WÈ/Õ~ÔxÑ®ÂÕ!1½Øñõ~«îˆ-ñûûÍu	¶ı6G5\ZVôı “µ\0?q´\\¹Šs¢ ák•†°öÊíj¯»Õ\'zwkbÎ3Áxj©_‡9Øµè.2Ş{JéÏzşDÂ“`_¤ÓÒ>À¿Øæ9“\Zô\\À„jğ^ØŸØ)€ËËÛ¯MSB4W¶Ö·šİò\rfå¨Æ‹•6/Yò©¢Û•£x>2.œ\n½Ş1S¼°ıùMB¦ ƒê½;ÀKOXEs:\0ˆNÕyê®H¯óaí5XÕÈŒ±>*Í™¬òûäãû\r#U\\Ÿ13YyB1º3nB÷ÓFˆ´³L#Mö‹A¦[Ø\r!¿áXáuV¯ÈØx×£ıˆ[¯ôŞ-¹ì¥J^ñ­ûÒş<”*$ÇY\"{ †Á:µ7ş.ùËi¾÷ë¢0é–é½z«]¿¥à\\ƒHš¤şPlèı…A|İ§½+X2¾¢ô³œƒ´:Hº5YqÁF«ªÒ?Tm2ÚU(4y~ğ‹å\Z·8^U“¥‰˜nÔµ¾‰Œi4¹½°©19Ö@Z6×İ˜–l>/Æ|€[mA Æ\0$²TŸø¢qp²û[¦5]Ä‘˜f¯Ç0ôõ©ó,O¯\'Áƒ¦KºâÎw<ÊÏ3‚¼fJ+5{—™~ühÿÅyèRÈF¨xEô’Ğ¨2‡ íZ’ÜØõ\"£ŸÚ›k<ŒæEUëYßâzº’ŞI5Ò}‡•Ú¤>b?ğ!ír1´f…¡Óx=,ËÆ±ÜYe´wL;D\'@mËxÜÄÂÑÖöÅaäSœÖä[6ï+†ŞÏ(g²ÂÔtô˜5‰•gi¢\0o^ªÛÊlÔhj5Ÿí¼öFF\0Dæy!,Ş­/B¯ö7¾)$5\n« Ëã¸el.z¹\0b‚–\\¶ëÅø»Êkw:	_hÈ\0ÉĞŞ™N~\rïßHÉ÷’~L&P-6Êu\'zÂ–E?Ú¹ôÆÜcz”ÏŒ*Ä6®–oJ‹åÖ+sıø\'„Ï{df\n®l¢2MvÔâuÜçÍËƒ¯½…Æ‹î»#åîo;i¯4	€Ù~z’06¯-9“üÎ@¾=]J(DiêùÜD\\ë¿\\¬Àö%Ìíºì€ef\'‡QöP§#8t«£I÷›mÀï¾ª¡°ø(ñôñ®†7÷W¿êÔC´m÷Öç¸o•9Š´O¾Š§*ùtrö<d¬A¯Î‰Ónòî|ËÄ½––üÔAJ×[O†WNÊm‡|½Ù‚A”øøduÕ“^öAÇŠEÑöÄ§²æEÈ:Æ7®d‡xıQ½x€ÌØŞ£Ä10›h¾¨¢doqX]¬œ¸¸5!Ë)w1#¬ù¹ğÚ¦K½İ‹³Çn0öâÏH~ª@èDŞš\rQ:¹[O°ß^ën\r¾õıP„±~¬WZ\\:ÍC>­:L’­y@Î‘µ\nmUŠôÅå1û{Ù\rÒ¯ö¹ô¼›\Zl„÷øR_ï”• üZ\0)Vg?öI6W±0m,´ûg\ZËUÔSW3Õuß\\>¿IÛ`íÿ@i\"@Äq7nóˆhEqÓ\Zë\0œ$Ù5.º«¹Ÿ&EïQÄ(éÑ±ÍÅWÂ2?•ŞË+¦ûğª<—©%RêI9¾™®[‘^|‰z:E)ÛG\'@I>½ŠME¦8\nr¸Uî…Ø»:uO©Se/Üx@Ø}K$¨9.ZM±ÙïP8?(%Œèá\r?{W™Ò.•¢PÑ‰ùr¶İ€%r1üë¨;Õè|–J‰ÉÊ;\0ˆ_Ğ;I¸zzv(e®&iàœìÙL/ÈìUy\0è6$Rô«û&}ÄÏ2îªc]›\nÏ¼‚ñt˜EÇ1ŸÏ¶é˜ÙÉøğeG‹È’\Z+2©pe­J=?e!»˜åà]±óÕYUI-Œw9á¬²¡5ûv GXE\"û¹J©Ç\n|KÍó¹BQ£%úÕ˜—“uŞô´Ğ‘ğ«;¶†jŞòîU¤\0@;½Ã™qË°°ıF3—í³ŞMNêOJÁ×¯m\nET§dŒ87©8\0ãl]¤÷ƒfyq¨bpëwÁU¾ı‡åÙŠ:©CŠ&•¡Q‰4’L7–ã½iFvã½9mo–¨XÎQ@ÌÅéU¬GyôĞ¤s˜tQNS¶J›“ØhMeó­qQİ:o±‘t¡ŒËK¡™ù³î…7|dZd«Ò¡øœnêG7ŞÍ4DĞ¥óÃ\0Nı„K’AX£ıèY&È±ãá÷ğh¯HıC±¶²º´„Ú¨ÕğòêA‚÷²—ÍÄdÀ–\r{Œ!ÅWÿk=W`¶¢Ì–Íîú¬°‘^Ê4í˜ÏË1\0ÈÇ\"üØg\"e„0f÷Ø¼u\"Ë-6ıÄ©1TI4gaûøFƒÏÙù§\'Ã4gŞ/1Ñ;ÎIzX¹$\Z0í¶Fæ(z¯Œjé¥°{¬÷tLl­Bi‚›õ†)Wß½á0©ô>=†U€³ˆU³¸ÂHÑ\nÃê^ú—á>*Gß«¶_^ñ©|9~¶|8fµÂéX©cêË&òsİ\0À\0Ğ‹éŒØQ&c—Ğ+å`x4ÙÙRĞŸ©OxÊ÷íYÃh«^ç¶ô£Ù„,¬<1bÙmûÔ±§Š8.œñN¶X,îïeSGÄ”ú±½îbÓ¯Zi~6×—+“ÃrlüäªªÃ¢S„Ô‚¹nÒ®|=c§0ÿŠi¿¾ÖME{ÊyfFˆ…nZWí9·Ş\\`!ÔïÄnœË\\* o@ZiIÀKóxPWEhŞ’@1å9rµßó¾–—…!±Hz)y½M2wÊ€âÃcëƒV2<­_M—gÔÙ‹ª/ü~<µ†6¼¢³Áÿ³tû§şû2É[ıáÊa£A-ŞÄ×Ç\ZŒ½mµ„x>\ZÆğÀyÒ–áx®>Dßõ•ÿ1á³=,¾y-“€€¥Q\nÍ qÚXäÊ­÷5èÒÔÌBÁõ7–M\"8Õ­‹-øûƒbL 1ÁK!^S·™Û¶Y íj{Sà[ôl¡´9UÓïÍ{Ñ\0>Æ˜R‘y	p´…m±±·äÄÓPBÉ;\"®+«äšşgÌâ¤,>ŒĞ!ÆÂ-NNÇ—æ¯qº#–.İ­±2É-^/+/DŒ[,ú\rrXl::K”ù\Z§–È\"â»İÊ\\€\0úJœ®J¨ØQòİ·ZÀË¤úˆ;º. S§¡­£¾\ZÔYÊ\"ğb Ïæ*@>Æ%*–+œ—_—D“²ú+¿}q¶`ãntƒ‹£üÓßg‰*qÙ¸csLúûİ§˜\0/CDæ35æáKt«/µ³_mì“6:;îÇŒ–Ä´\\üOœ÷?ô›Ÿ~?t´c„f2‘/€¦A>a÷Ñ+ìõímØ›zJH“].;o‰}S4Û›¶»,4G˜LwÉÖQÍz®\r³¤ââmr]:Õ›CãğgLBE½¬­VŸ{Rõª¢ä…ŒNÒNpñ<®Ÿ­Ôq¨¯ÜvfÑÚÖ”­Õ½‰«Ï~zİc~4”ëdìJU‡vn´ükYlÃŞØí¶ª\"d©‰´•ßÛ-®\rzµ‹új=½›Šè1èÅ©ö”Ír·sÖ»H×f#–úè±iÒ«3~İÄó\'ı‘£)î—§î?8’4,ê|‚]ğûŠÇ5p«Æ»Æ²u5ÆåDù-ÆÒiÁ/õ1OäÖ“O¯ÕöqÜ—–u)»“xp9¶…ÈŠ•m²Áî$&X*&*ßŞi*Sœ~IÀ–ÂM$Ã<5&½KiLÍĞšÊ\\^—~›¶PÖÒ2c?ó¶‘îjÌ–HgÇë~…\0„àö˜¼sº¾Íc±ìv—b`/àâ3÷Â_“:/¯‡ÏæĞ^ß|ò|:¾8,ìN©Ê\0€H\'úe\"õ¾@FK=\Zº+yq¬—ZSx&ëã}òÃş{›3—÷OLlÏ¨ÓÀİ-qÛøí£:Ïrû2XÏ×¤6!òM?,â,H‹–S­\0x¼]i—™¼‡]J´œkŒÿp7´K{”æ°%šÁ”™CjÇ¶E\n_:A%Ö´u\'Eq‘{\0R§½2¦9ĞóbÙ„Çø*#Üªf‚têìÌ¿ÁWX{çÃxb‡²Úš;ª+>\\ˆÛ`qó\Zlïç£7{P©1_R:—GÎĞ.í¬½àcËş¾¥¹³È7äqbb²¯St‹8‡§ñ%˜cjË6Ÿ—#“\Zqr{»ñHºÏ¹d~Á?ËËĞ?+wÚ•ˆù±6!•úk2ÿÿã¡,ñ_$KHKKC¿Ë²‡²Ä¡,q(KÊ‡²Ä¡,q(KÊ‡²Ä¡,q(KÊ‡²Ä¡,q(KÊ‡²Ä¡,q(KÊ‡²Ä“,ñÛ&şO²„„,*ùŸÿÊÄ¡,ñ_*KÈHËHI’şöü‡l','2020-11-03 17:48:05'),(11,2,'audit/log','xœíYP“Û¶éTŠÀPDé¥†*6RB€(H‚JG¤#¥Ò{“  t&\nÒ‹tE¥½à9÷sïñœy3oŞ¼™773™½WùÖÚ{­µÿ,+yqù{xyYyG4oe‡Æó(XÉCåïaä!Äé__ğòP)yƒëc.5#--.U„–‘¶—š>B›ËÒÊÕC°°±\"XYò(`äÅ‰—$ñ’ ²IˆËóx`0ÀÆ\Z¨:9:Zamäå]\\Ñ8B¨‚¼¸4DRRBJZVJ\"-şàı\0©t’ò<¶4Q ”Œ<˜•³³˜\Zkã„³FÛ ïbì°bD-\"?ˆáq(1G\'´^v2\0Çp¢ÎöÎ\'ˆ²0Xô r\n?L·uÅ¢\'ìÉ¼8±µe¯Å£q„:åyPVxüiÉ7è7¡ç\0%äyD”x<Oüğgø’rÿ=øZNv†V8;4á\'°¥d~‚š¨ÖÊÆFåøUâBü;l(ÑmÿĞNtºÀ¯n¿»é/­‘ø_²FFòÏÖHËó İşì}	¹Ÿ›ñOŸˆ_êdGÊAe P‰s ÜÜ22Dp-¸ªá/\\ÄŸåm”«¥¨¥*BÇÀP¦®ch¡Ó†[rÁ¸,QNX<g…Á,°VhKáå8‰‹¡vpuÄş„R®×‡ë¨Â¯ZÂT´ààÁ¡mÑ84…¶± XY; ÿûO*ÿÀşGí¿ü\Z«¬­ÎÑêÄÓx”=ÚÑêwq†ê0-‹ß6øMÊò\r„ºÎ_ğjÂMÿÁÈ\0ví7\'0¹:?0óÿ¸ÿÜ¯ª0C˜âš%—âE?ŸCèÿSÿßˆP7àÒ9IN0«#ì7*\"NˆÿbÉ\rT¯Ãµa?Eö©¿fşu9~ÂúcâãëDÿµ\\E®“djm…GóüjÎ¯\n~İ)?£úåw£ÿ¸¹ø~OÎ|õ3ªÿY\n—“’ûO\nÿO\nÿ_LáRâRÉs¤ÿ˜Â¥¤äˆ*Õuàú†\\ÄXBüË±„˜7Ğ\'®±ÀØX\nsYÈ>y¢ph+úÇĞ2®0-#¸¿„ğo1!†C7;ÀG€H@DÄÅE P.qyIYyˆÔÉ°{r»ñşì¯¦#&Nå‹),Ç\0â7W)³¥¸|ª‡u(šbPäc€ªÇ¼qûÜ<¥QMË[Ù˜t¯†¹¹^ìÖ<yÈûèÙ¢ÍáÓÏæ!Ëß\0ÒôÉÎa0²Î¶³òêB„<oÇgWkW©u€œçĞİZâÈ^ ÊdaPs‚*—VqWÆ>F¾ÖK­Ì‹¦z\0•ÒFf€EÎê½°Uiºˆ	ÆjÆôa]‘\0	øÆ7ôîJŠ%$¤à;û¶›_$eÖ¯ß,ğH™kíÜSÑˆA˜\0äì2ƒ\\B²6¬ÚDj\'~tÅ>EgµëÑâ2“ºãÅ±™k¼B3÷/¶×M@ò¬:ÍS<PÖÀs²gm!={‹êTŠ§…Kt<zÕIİ‹»@„?A\'Ñ«ó]‘\0b®ÅtÇË÷ãÎÒsäê\n‰İÁKÆbÀÃèXÚúTˆêUwå|?\0=®akc\rÑeA§ÒxUĞ*;©Ñ…:Œò3¡ÅtìäÊ~räÚšF›Òû;‚µš1k^L%cîí.•]Ó2—Ì¢Ckp¹Ï¡5Ô•¬6J\0îÃ½·a.%cz’“aqBí!BEãªYáz€û<sDƒl/w\"jö“xD\\2#\Zàjó\\È·MN}Ÿ£½Út—2ƒIÅÅaÂe](\0ËXAuQ¤Æ&«ˆª¾*uZ>	câ\"oæ^:\\Áõa“jû@r×T\rÜˆÔyĞl#à¡{@qõÅ£]?—•O² Ò7ìjV6Q¾ÆÂ…B££7Ö!Ò¹é5÷ë©(C:‡,M™O\Z8JË*Ø£ŸfgÑí\nâ[ÎqÄÜ;4¹ƒ\0X—û\0Ó¹P^ØeÙ@rJ(•Ğ-“ı½+\0âC¥% úvğ„n“%×´/¶\\ÕLı¶]\ZÁ›ñUñnl‰qü%²\nRX$5E*  N1Ï¾°´gmkt¬—€ë=PŸ-&Ó§Ò˜³+4ş,>›%^só1\"ñã¥LŸÉ¯ã¯~$˜]lsh¼;ÛÇıE)ğñ«2CzLdtK«xQc¿àæ;“°¾¨UTxàkJ®oQ™æ@¢©œhb®Ñ©I~èV“8ÖÉò„ÅW¥/> ‡ßU›öÆœÄì5*šC¨ÊzË¹å¼t&´=/ì¹¬õŞeÂÔ½§.Ğ­²–1µ›ıò¼ş&Ş¿L‘C”k×»µÙÖqåmßkóòG¤Ş¤ôç¨œ·İèÈÒÎ¾Ó\r2‡%†Â*6(™²œîf—œãøH¶0l©²»¥çóş&(ûUÀWéıÎğ‰ØzáŒj²J~°%yhƒøZş÷4pq‰œªQ\\•úô»¹g2\n)l õ+×ÌIŒø3Ú½†ÅdCÕ3Šéùµa×óªO9šÑ‚İqİ>ãsƒÑw‡Iá]¶ƒLdñ\nÍ3Ö£…	6«ÒÚŠTk\0—Ez‡åp²Ït.O­`èVÒÓó%ô±)šx/uÜØ€åêv‹ÓZ\\³ –8ø¾ùŸÑ%ÀÏêì3÷š±i¯ï£²ÇWÇº•$Ò\Z—É«™k”	HÛ ç”©ÖÛ	ò¦ó£™«;>ÆO·|÷ÇZSH]Zaç%\rTÕsK&)laOoÜ\Z­±ŞN\0|¬”rˆüÎQß«{¡öÁ¡Ê²—{Q‰3›dœºo^ctæt7Šîˆ,º£ìõ¹¨ü“ÁÁ¶O½LeT³´U^/øš[¨*¦ŞŸçäe¦uÈY‘xí¶œwWŠ†’£5g\0S©­Ÿé\n [m\0wÍëx\\Õ‡œâ}eMß“¼vƒëSïEI6í¸W	púÓó,ÜAÒON1„Qæ0±ÔÌ6$Õt·¼}Îıše‘NT(ó¦5Üu3=QP®¬pï™ ªaaóÚ”Z—uÈAI¯áeæ!ÀÒs×Ø4.L¹oÜ$ë¬°M<ßX³¸qã›÷½ïl3Wîó	ÿ±ØXÿm	X71sšUcôZ26ñâ6¤îÙëK7Ä™Ø©j:‡fh\\w·>\\ßTŠb©ïòbM\n¸äØŠ}¦ÆeåĞ/·í¹ÔU&î·|;„–WWû“¢z;m‚iV)CxšNˆ\rÀ÷…Âj8w÷UÆ6\"(#œ+È™Å¸’¢e35×È¨ÊKN½…Y‡Ğ_• ºt4™•tõl„g€’•9N½vîBî)x”a¯n€ğ§;\0ÖŞä\n*çGtƒìúÕêÌ§€§ìÁÒöè…àÃ€ê DÙ®KhËuf¹Ç74\Zã;ûŸl?ô(hƒQSÆñÅ˜]6k»yWÜâ¡ÖtªÍ…ûÌô¯îq]¼Ã\ZÍ<+Ù{ñK4·‹–t¾Ô¬‹^ÌëœqJ_.Úáúqùogûn—à³E_>Ÿï©ğQ0S0c­Címä^*Ü4«Ñ~~ûtòà\01\ZÔ†|=n×ú}¤*NhÃ¨¹œ±b¹Ö¦852íò6ŠY\0n¹Êâ¢©eäfö…í|§8ÿã³\ZÖ‘{CaIÇ\r_9mÔÃn\ná.ÙQ‡CvG${ë&±ÃĞı¡¢Á¾[ÊıE‡Ö»”ïª#\0ğ,\n‹ûLÔ:¥”rK&ëcÅrû_ï×ôøæ­ÍØ>¬°«^–kõaö—sßí±ÊSkBûÓœ§ªj,ÃöjØ®>{Ù—4Ü~ğî!ÛâæËı›\0«d›ñJ@î6ã\"#€À³\rÕGªÕ†>êç&<yz—h”]`+Ø÷oØVXöøÚ {?DGqnJ¼§~ê’SyaöÊ˜. ¦dwEº¨­F_1RHhR\nÊ´u”«PMhì\0fz{È²/rOìàñ±~kC¢íPÍiõ¦\r=?èl=ÀÍœ®P®fŸ)lºÎœH¡.¤µá_ã•j·Y«û°n8ö\nƒ$w=åÛğ)»6UúG/È˜¯œK¬\rñõA:­Üë}î‹iÁ¯ø)F…ïğŠØüüãútµ`DkePQ{£ÑYËÅÉC\0©ØaTn¾VeÓÍT@Ó©Íı‰~å|ÈÈ…’•ı/ã‰™Â.Š×´î\0\'=cÃî  ÚÕW({£¼®„wÖécT£2§)4²+“ò{M7MTs|A/dçÆê,¸	>?NŸ P/2ˆOx´dÚ¯›ìavıÆâ„\nÕ˜½¢úã\\OAÔ#ï¿Ñ}¿ær”&qÓ·^ôkç«0ŠĞ\\gñœá::ë´|Ú‡L¤İó¼¶E$¥ÛBç\Z-ı&”Bòô£¨’‡Â0aWFp\rŸnbHx‹3.±£õÓø£Ğ¨öÅIjU•¡Ñ\ZûĞÉŞ\"ÁÙ+“€O4Ï¨Íñ\\–*r¾YÇÚÛlì¿²«>;ŞD\\6×ÃØ¶^/sú€İlC ¦\0$ªLğo‰ÆÁÉîo3Í¤É*–˜iú\rÂŞ¿ÂôâN2,x¾´/0şJ×³‚|CÈ[†Äğ2Ó÷YgO][†®…î„‰µ‘Å¬	N*³	Øn%ËMİ)ÆÓûÁX,9˜$©^\'S´_ò-‰¤¥)˜…ûÏ;Ì”Æ‘Ë¸áé7J utèæ;áÙ6Î*“SZ¡Úğ=£ic?|tP([GÇW‡‰Ïñš³ïX¼o\Zx¿$_È‡kë2ªª.QEüA«VL;£a¢¥İlq\0ğØ\ZP3’ï…0¿½\n½5Ô<>QD\Zf^3L:•ÏvßÈLäÆ 7\0„DM¹\\^Lïëé÷U·ôà¿5Q‘à’®³\'ƒô6,! ™œ·›vF]R\"°Ft’ãAÌŒ-“^ŒsÙİ›Øç´x(¯)EhÀb|=ïœ&Óı7fz	µø/G$¦\n®,\"2-v”b\r\\—“Ì*‚o¿ƒ&»M#åíà´WšÀô8#Y“ß‘R€Nyo ß_¬%YjéÿÒ‡DÜºQ¢Àò5ÜíìG€[dd%•$ï§Ì@$²éÔÄÏ7û€Ï=bS]aõYÒ…q±Ş¦qÇÇ›€Ouî)Ê¶oïKü÷áª\\EêÚobiJ>=ìıO™gëPEKbÔ»#¼Aß³°o¥åc\0_&e°Òmä^íØ§Ü~è·{]V’%^^YíáUµäîAèT‰Êp÷|ö²0I×ÔêÎ€ìËµ?­› ™ûGäè`Ã‹ú¦3­×T”ìÍ©‰VV÷fdÙå®e†·¾ÚÚui´{}éÌ]úÜEiÀG½ˆÈß²!H§ôé\nÙk>¬Ãµ4Ò‹óJÏ zÊ«Ù€N¶5Ì=u·^²¯J–±º>eÿ(§é9]Æ­A‡®w«C“ĞoÚkÒã/²âT€O Eì§>Pç)¥O…õ½fOÇa8\nƒûêæz›ÉãvÉâÚ\rcè2Ì¤\0ˆö®?·°f4µ‘^!ÀJÜfâ ¹•÷yVäY¬’.\rËR aB•dÖç²Gùá%4ßTä1´EIÕVàZiúiÅÖ(çS•\"1ñ4üä¤ó›˜4dªÓù`‡û^ˆ£[s”zT\"ŒF„ÕÇ Tœ’íšå‹ıa˜ı£‚aâ„.Î1Èà‹wå©9­2)2xP¨vì×K\0¬‘ŠâŞF?à¯A0U‰ÏV=\0@ìª.\'şÖ…ÅÑÔ¥ºäáË²—²¼ ‹·ä ÙOÕ«|šü	·tŞh(ºyk.\"ğ|:Ãİe\ZOwv9Ç¦ká ›ÿã×MSZœğ¬ÂÍ­jµ‚Ô•œ¦g€gÃÎW{S%­(Áåœ³Êæâ»á~!ñœW*e°=¸ç+…âfÔ›)]/\'ëüùyÁ%\ràSsşb\rÕ¸ï= H€VF;š=ó¾AQçİVÛ—»ì”Ÿ•BØîÜŞŒ¬Iç¤O¾<«8\0ıbC”÷“Vy1¨bHûWá-Şã§ŸŒXŠ{(C‹g•¡ÑITüw×¼©\r\'¼Ùmï•ªX,‘AÌÄhU¬\'¹uQÄ:L<(§+[¦/ÆËóï´§±øÖ¹¨Mî]1ßI¾ZÎá¥ĞÊøEçê8/‰&É¦t.·òÙİ÷M‘4©x‚p€U;ç’¬N@à·¨?y–°xø=== ÜøÔcª£<—&=±>z3¢¢fï½îe33¸gÃ\Zk@ö)àvÿMI[‘¦ë¦}6Xˆe\ZvŒWäè\0äS1[AÜKár|8ÿkÓG,^§§¿9G“ä•˜|fW­\"^2·}~·ÉçÒòOÎp…k´†æ§®‹Î»m‘¸‰<*§XûH.äŞ$9p!6®^[¡,ÑÍzÇ„#×ïÑX¸TÆ .İ&ÀšÇÁÍƒ¶(J¤Ò f€¶û)ÌGåô8¡:p¿ûš°OU÷ô¥Š±ØÍJ§3eiİ-¤]—û\0@7¶\'ò@™„U\\·ŒîÙl_V[áP–şïS–—…“í8még‹‰ÙyBäºÛşùS/ÿ­\\8ãœl1ìßuGÄœÚ™£¾“ošé~6wÖ«RÂsmüäjkÂcRá!÷¨7¾]´SX~ÃpÜXï¦¢5ç¼° ÈD3i¨€ö_Şn-4rb5Êc,ãWOĞ\'®´à¡z>¢£Æ$¸\0kËŠ@X1ä;rt>ò¾ŸÆŸ2Oî–¸Ó!‘7§Oöñ¹u“~;	Ú/×¦×”½\rêìEÑÀñ8R]VÙÓğEºóóĞc™”½¡åğÉ àf2º6oÂÛ³\0\rAŠø[®!^M†Ó=q!·¥;›§«Ñs}pFèêb?“o~Û¬>à`Ai’Œ{7XŒ:¹qÿCª,-«H`{Ü¢Eë¢º×f¾ûĞ¥_‚2Â{)$hè´rÙ¶òwÜêlé<¢[Amä¶Âçë†	àS¬Ùg™n€¥.êˆ‹[¹/\'–n%˜r ìº±IªpÑ4^Êüã\rb*Âœs>¡¬`‹İ±¶rıa¥q^¹Ğvy©XbÚzxÕ·x„Í|×ÑY¼´Ø×`:­T‘ĞçVş`ùq¨´7b4Õ‚%ï¿×Õg\\1\r=ÚX¥H-mµÍàê0&ş×Ãù6·\0ò96I±Bá2€t[IÎªúşÕÙ€‡1M.ò/J}_&©Äç`Ï,1è÷}šc\0<t‘Y/áŒc×ézhğ–_ë¿ÙØ\'ïôt=,mçÜ|µÎÇ‡Ì.	½*=İ5A5›Ä@Ë¯ûd.ÛMÖÆÎÌ½gıx:%¤ñ!‡·ø±	Še¼ã!Õ)“C’m«O¦ı·ÇX\0RqÕŸT‡FuçŞè4ìåƒ`±Ã\0s»å—ş4İêhyACNêîçõ	‹Uz¡UûÎ¬O2Û;Zr4ûv±9/îx,O†qpÆmÄRtiåÅÈ¿•5×Î1È•ôï¨.F–K[ú½ÛãØ¡…\\Óƒ÷ì*¢¦ _ç:S?µÊùçn)öÍ†L‰Ğ3…ÒÄOgÜ¶±ç{vÚS§SwÜoÌ=~r)4yLÄù«&àó‹oà~wEûf¬Ë¹ŠûôeÒ_ckå¶S.lÕ²=––u.tr8¶…MÈŠ–ï²H>\nLJ´PL\nRö?h)‰Wœï¦dIå\" _L\Z¿¥Ôç–?jÎ	f­	mËÎ¿K_)oJm[0‡]|×Ls+vO¸§ëí¿¢\'\0‚w{NÚ³İ8„æ3Yô¹K±\0pp‰	YGo‰…ÎKØë©ãË%”×wŸüŸ€+	Pæbå\0\0@¤í:òØ c¤>”¸65@©!´ıé1é¹1€£İ…ÇçföÔ¨`îØ}Üşé.í—¹‰Aƒ™Ì—CêRƒZÆgŸ³—¤yÛùv\0<ŞmMHj•¼d±Ôœğ	`ïj•õ+-aJƒ4BÈ³Fágö…‹º\r¡â[Z:³\"Ø¨#\0iĞÚ˜Òî½nÌmt‹fY7C¬:Ëã¸JkïIî¸ÑìÖ®šÊÏ…Wãw˜Ü¼F:‡xiMŸT©¡ÍÖ”.ç“ÒuJ;k­ø˜å±ÖÂö4VyG=ÎÍÌ6ÍãqŠicó4º.é˜Ö¶ÏëeJÏ\0\'Ìîï7ŸÊğ¹œÂ\'ğ§¾ôÏ}	´;\ZåJ@ÿ¬3!‘…HşŸ·&dNşÿ\rãºÿºÒĞeOÏÿ—ãKE','2020-11-03 17:48:05'),(12,2,'audit/profiling','xœí{P“ÛÖöHçÀ RP@”„.`À ÔPÂFJ…\0I@P©\"Ò‘Òé½‰TA@Aª4H/Ò”ö=ç;çã9óÿ÷Ÿ;ßÌ2“7äİ{¯õ¬µ×~ö~y&VòPù›yiy^GŒ£ŞƒW+…JÊJCdò0y^\"ÖÃ«`#“•“–•„@¤e¡RrP)R»ìÁ0ÁÊCàU°\"Y¹‰•—øí©TJ×àÒ˜[ÍHK‹[©e¤­cÀ­¦Ôæ¶´rµÁ-l¬ˆV–^%HoYé\"I\Z\')!ÏëÅk êäèh…³‘—wqÅüŠGB\ZƒIJIËJ‰‘\0A¤¥I÷a$ÏĞ­ä¥Â\"á·Å:ğä¥däyÅ­œÅİ08\'¼¸5Æsk‡\'¹‘ıEœ€G‹;:Ù`âğƒï!ælïÌû#Xæ;TI¹ÁÛºâĞD¬î ]‚ÙÚŠˆ¶WÇ0xâwŸò¼h+á{3ìÏıj”èáü ¤<¯¨¯‚çş>Lîÿ¾–“¡ŞCü	l)™Ÿ &¹µ²±Q9\0~4†\r%¥í7_àÀøîüHø=Mä(\ZØ_£!•1ÆİÙé¯Ù—”ûyÿãàoà“ğK”¤T–ôú-œ·¼å¤ÿ­ò&9—8,ïÃòş–7LZJ\Zrìå-#Còh€ĞB¨\ZşÂMzY^C»ZŠYª\"uõáê:†:pm„%7Ü€Ûí„#ñVXÑgåˆ±ù×+ã_z;¸:â~ÒS¡†ĞGè¨\".XÂU´ƒÇØbğ\ZccA´²vÀüóè¿¸üÃğ?zÿåÇjÅâlğV™¶  í1V¿›3T‡kYü´Á¯öĞ–¿h Õuşf¬&Âô7Fğ‹¿‚8€ÉÔùYàûõçyU…Âµ-¹¿;úyRÿ,üƒ	unz‚ë\\øc¿öünRğ óßL¹ê%„6ü§È~kúûÁ?¦ã\'C¿7üb|‰”ï¿·«È}@§ÖVŒ€àp~8øQ)?ëõËïAÿ±œ¹ù§gş¿šúY¯ÿÏ3Šœ´äáåÄÿ“$.ƒÉ~\'q©C?$ñCÿÿ÷Nâ2‰ŸIüÄÿƒ$.“‘<Gæ$.%%Gr©®c€Ğ7ä&­&ä¿<_’˜s\Z¬¥·åíƒO4cEÄ|¿õ½› ÷e¸–Â€[@Rä×U!Çª@ä\'İ„HBD%$D!Pn	y˜¬<Dêà¶{R«ñá­ì1¯†=–“Êg’ÙöÄoªBfJuîH\'{4ÙÊ¿ĞÇ\0ı$ûÊíSã˜F=_E}âÍjÖ6Ôr‘[ãè.ß½G×WL?™ÏS|(Ó»A¨\ZÛöŠ3áò|mŸ\\­]¥–jšKSlm+k†&ƒuDÍ	ª\\RÉSsõ.J/¥b¨//6Šæ\04J×™Y5U ßÿÔV¥á6x\0§İsİEà³¢w&ŸLhï^gn|Ÿ˜iX»|%ßS0y4´¹}KE#\ZiP“óLrñIÚğ*©¸¡ûdÅ{³ó,êg†\'.ò	OÜ:Óú¦f’kÕnì	€Ê€?á$gæ\ZÊ³«°F¥h\\ğºD\"¢Ô½xZÙ\0Dä#t”³È5İ æZ,×½|?lÌ=F-.Ùí<c.¼Ì%Í…i¿¬˜\0 Ó5Ôsif¸.ª4ğH*Ÿ\nFEr#%ª@ÇŸ¹]~\"¤ˆ!€“‹RÙOR[ÓhU:{Cè‰fô’Kñ°;S«KEÇ¸ÌY³¨j|Î‡\ru%«•b€óu¨Kñ°l44V˜©5ø}ˆXl;BğãgjPlåŒDNa‘MbÆ\0ü“\\Êu“#ß¦èÄ.4Ü NgQqqqYÎÀ2FH]¥±Ê.ªz;O•65Œ9a–/c+\r¡àz·Aµu xj+ûò/ÇéÜi´ÎôĞİ¡ºğôŞ¦ŸË†Ê \'E`É+N5«\0›H_c‘á¡!‹ËK¨`éœ´ê[µ4ÔÁíı–¦÷ÌG\r¥eì1³27…M\'¸¢oîš\\GœË-\0Oèœ.+è°ì )9„Fx‚Åşæy\0ñ¡Ñ{=xCÖ)’ª[gZv.h¦|]/	çKÿ¢x#¦Ø8î,E99<‚–*íï«˜Nà\\8úã¶Õ:w–Ë\0ïÀwí¨O‹PèHPjLˆÛÈyºŞÛl>«Å^SÓÑé¢qoJXÓ?Q^\"\\ø@.89Ğ:ìPc²›ç³RÀıç¥†ŒØˆ¨¦f‰Âú¡Õ·&¡İ‘‹è°lÀßTÛ¤ 3Î…ÂĞÜ9:ÒÀZ­St×­:a¸í›¯[w\\@íö¾+¬<1î=:ŠİjüX8…T•õ–sË~æLly\\ĞyNëËˆ©{gM€[ÅbvøØfÖ³Sú«„Û¥Š\\bÜ›ŞÍ¶¯»_˜—İ#÷Ş!g<A{ç”íJ@•´w­K—Ù-6Q±AË”f¿ìmtÉŞ‹àÅÅ“+»;Q{>îiĞ‰´_üŞoİ¿¨­×±“‘\rVI¯\0n§·8c÷DàBB2»˜f_©>şvê‘ŒB2ÇiHíÂEsr#ôV¯qÙõô\"Fmø¥Ü*À[†a¶àt\\¶OÿTgôÍaTd“c\'U´@÷ˆ}of„CÇª—ü½¶\"ÍÀg’_gÛí6ÊUËï¿šøÊôT1cL²&ÁK]#\'&à¸»Æİbµ–Ã„–,h%ş¯·éÇu¶Y»Ì8´—ƒ¶ÑYoßìî½T’L¬Ÿ§¬b­fR&\" -}c¦Z¯G(N\re´/nø?\\óİnN&wif6†Ÿ‚¨ª=æ%*¬á®\\ª¶^üìÔrÈ¼ö!ßx«›!öA!Ê²çºĞ	«\'u_=%?Áì|Òİ(Z¤-¢ğV´òíO)Åäôõµ|ìb)¥i›¤¯ô:İ»{Ú×ÜBU8öîTÜI>Vz‡ìÉnó¹7¤è¨¹š³{±ÕÚú®\0²Öğ½öß¨úPR½k¢®®ö{ÛjpiìÙªÏ\"À£\0^|š\'ĞAúÁ¦Pêl¶êÉºŞÄê—M¯ó¼`›eÎ¸‰msÄä—)+Ü|$¤jXĞ¸4¦Ëm¼SIÖ%G|–±pŒ<Õ6õ3cî+W(ÚËmNÕWÏ®ÜZùjÀsóÇÄy¦[ü‚\"Ül¬ÿqX61sšTcöš36ñâ1¤íÜêN3Ä›Ø©j:‡¤çk\\r·>\ZTÛP‚f­íğcO<ëØŒ{¤ÆmåĞ#·î9×Q*á7-˜OOû£¢z+ƒm¼yf	SXªN°\rÀu‡íÂ«Onn«¯D8Q‡;+V8Q²Šïp\'FÉfh\Z/QĞ”y\r·f¼0)Isvo43ñÂñpO%Q\Zs¼ú“©Ó9G‘†]º‰\0\"æH8{“óèL¼)\rvğKª2ŞÒ;sëC§ƒvı«V‘\r›.!M—Xåî_Ö¨kïy°~×£È¿HKËWmvÎ¬åÊ	>	‹»Zã)6§o±2>¿É}|ö:{ë$¬ëÌç(-é<-¨Y7á*#£¸×	$òˆ¾\\”Ã¥óò_gw;\\+&d‰={<İY%\"è£` ®`0Ì^ƒŞ(\\É9[±İgV­ıøÚÑ¤¾^ÒjPë÷õ¸öÄïMQ|VÍå˜]?ÛÅÅ±Áq—×‘¬z\0ğÈU¦KÍ£V³N¯ç9Åî×°ØêMÜ¯ûrÒF½>ôŠ0şt mdsÖµ[3Š€n÷öu_Uî)ÜµŞ¤¢&zWî@`S˜İf¡Õ1(¡–›+ß1Y.’“ÜşrÓ¸ºÓ7oxiÂön¹]Õ¼\\³ëm9÷ÍN[á\\µÌmºS4OúëKq]\Z¶‹u d…×ï¼½Ë1»úlû\nÀ)Ù¦?”»Æ<Ë ˆ,CõÁ*µøşú9ñàŞÅ\Z¥§9J\0îİ+v€Û¿ØçŞÑQœ\Z€’.oR>vÈ©>5{\0eNTS²;¯‹(]ôZ½/š´RÈèRêòKµµ^´«puHL/v|½ß²;bK|çş¾~s]‚m ÍQõ†=?èd-ÀO-W®âœ(h¸Äš@¥.¬µr»Ú+Ånõ‰îİš˜óL0Zê×acv-:‹Œ÷Rú³?‘ğ$Ø×å´´ğ/¶yÎ¤=0¦\Z¼¶Á\'v\nàòòökÓÔ‚Í…­õFÇ-gGw¤|ƒY9ªñb¥ÍK–|ªèvå(Œ§E¯·EÌ/l~“€”)è zAïğÒ–Ñœú\0¢]uº+Òë|X{>V52c¬Ê_c&«ü>¹€Gàø~ÃH×gÌLVPŒÎŒ›Ğãı´\"í,“ÄˆGS†ıbÉvCÈo8V¸@Õ+²\'6Şõh?D=âÖ+İwK.{©’W|kÅ¾´?¥\nÉq–È¨a°NíÍ£¿ËÂDşršïıº(Lº%dz¯Şr×oD)8W?’&©?za_÷iï\n–Œ¯(ı,\'F?­N ƒnMV\\°ÑªªôUÛ‡Œv\nMüb¹F-W²4Ó:Ö·1‘1Æ·6Õ\'‡Ã\ZHÓæºÓ’ÍçeÎ˜p«-Hä€D–êÿD4NvÿÈ4£&‹8Óìõ„¾>uåéõ$xĞtIw@ÜùGùy†×L	a¥¦ï2Óí¿8]\nÙo¡ˆ^\ZUæ´]K’»^D`ôCì°Yr±ÆÃh^$Qµõ- §+éDøÎ;¬ÔÆõóøi—‹¡5+½˜ÆëaY6åÎ*£½cZ!Úˆ-£qc?BT`G[Û‡‘Oqš“oÙ¼¯x?£œÉ\nChë2«+ÏÒDŞ¼>«fl+³a7²©Õl¶ğÚ\ZP=˜ç…4·¾½Úßøf¤<Ô0¬z€|,ã–‘™èå>\0ˆ	šr9|Ø®ãï*¯İé$|m !#\0C{g:ù5x¼#%ßKø1u˜d@µØ(×è	[½hçÒWpé	P>SªÿÙ¸Z¾)M–[¯ÌôâŸ>ï‘™*¸²‰Ê4ÙQ‹×qŸK4+R¼ö\Z/\"¸ï6’»{¼í¤½Ò$\0¦ûéIÂØ¼¶ä|Lò;{\0ùöt)¡ĞêHSÏçnòZÿåb¶/an×e?\0Ôğ,3;9Œ²‡:™À¡SM:ßl~÷ğUu…ÅG‰§ßÈˆw5¼q¼¿\nøU§¢m»·>Ç}¨ÌQ¤}òU<UÉ§“³ç!ëd\rz¥pNœvs/pç[&îµ´|4àÏ Rº†Úz2¼rRn;äëÍ+D‰OV{`Q-éet¬XmO¼q*k^„¬clqã:@uˆçØÕ—¨Œí=JLá}Ó‰æ‹*Jöæ÷‡ÕÄÊ‰‹[²œr3ÂšŸ¯mºÔÛ½8{ìc/şŒ4à§\n„Aæ­Ù¥“»uûí5ïÖà[ßEéÅz¥Å¥Ó<äÓ¬Ã$Ùšä¹Q«\0ÙV¥H_\\³¿—İğ˜!ıj‘K×»Ù¡ÁFx/õùşgAY	\ZÀ¯	PbuöcŸisÓÆB»_p¦á±\\A=u5S]÷Íäƒğ›±-†Ñşt™&’Dwã6ˆf7­‘^ÀI’]cá¢»šûiRôEŒ’.Û\\€a|%,óSé½¼°bº¯Ês™Z\"¥”ã›éºéÅ—¨§S”\"°mqt”äÓ«ØTTŠÓ© ‡[å^È½«S÷”:UöÂ†\0„İÇ D‚šã¢å›ıq€óƒ‚aÂˆ.Ş1Ğà³wÅ‘)­R)\nD`ˆvÌ—³í\0,‘‹á_Gİ¨Fç³TJLVŞ@ü‚îIÂÕÓ³C)s5IçdÏfzAf¯Ê@·!‘¢Wİ÷0é#~î”QTëÚTx&àüxŒ§Ã4*8áø|¶MÇÌN–À‡/;šD–ÔX‘I…+kUjù)ÙÅ,\0ïŠ¯öªJja¼Ë	g•\rÍÙ·=Â*ÙÏUJ=Và[Ïç\nEèWcº^NÖyÓÓBsD:À¯æüÙ\ZªqË»W‘\0­ô6NgÆ-ƒÂöÍ\\¶Ïz79©?(s\\¿¶)Qv’1~àÜ¤â\0Œ³u‘ŞšåÅ¡ŠÁ­{ÜW]øö–4b+ê¤)šT†F%ÒxH2İX÷¦5Ù÷æ´½Y¢b1G1§W±åÑE“öaÒA9MÙ2m6N^`£5•Í·ÆEmtë¼ùFÒ…2./…fæÏ:Şğ‘i’­J‡âsº©İx7ÓA—BÌ8µ.IêD$aö£g™ Ç‡ßÃ£½\"õ=ÆÚÊrèÒj£VÃË«	ŞË^6“[6ì1_Yü¯õ\\Q€ÙŠ~0]6½ë³ÂFz(Ó°`>/Ç\0 ‹8òcŸ‰”Â^˜Şcó::şÕ9Š,·Øä§úP%EĞœ¹íã\r>gçŸzÓ˜y¿ÄDï8c(éa~ä’hÀ´Û\Z™{ è½2ª¥”Âî\r°ŞÓ1±µÚ\n¥	nÖ&\\9~÷†Ã¤ÒûtVÎ<ap…‘¢Õ½ô/Â}T¾!Vl¿¼(âSùrülùpÌj…Ó±RÇÔ—Mäçº€ Ó±£LÆ.¡[ÊÁğh²;³¥ ?Sğ”ï!Û³‡ÑV¼öméG³	YXybÄ²Ûö©;cOÿ´]8ãl±XÜ?o\ZË&È)µc{İÅ&_5Óül®/W&‡åØøÉUT‡E§!‚¹nÒ®|=c§0ÿŠi¿¾ÖMEkÊyfFˆ…nRWí9·Ş\\`.ÔïÄn”Ë\\* ¯OšiIÀKóxPGEhŞ’´bÊsäj¿ç}-/-B8bôRòz›dî”>Å‡Ç>Ö\rú­dxZ¿›.SÎ¨³U_øıxju-xEgƒÿgéöOı÷e’·úÃ•ÃFƒ\Z)Z¼‰¯4#$zÛr	ù|4Œáó ¥-Ãñ\\]=ˆë+ÿcÂf{X|óZ&õ/\03J£<›Aâ´±¨•[ïkĞ¥©™…‚ëo,šDp.ª[-æ[ğ÷úÅ˜@#‚—B¼†N3·m³@ÛÕö¦.À+¶èÙBi+rª¦ÿŞ›÷¢!\0|Œ1û¤\"óàhÛbcnÉ‰§Y	%ïˆ¸®¬’køŸ1“2ÿ0B‡7?9_š¿Æé\\Z¸t·ÆÒ8·Lx½¬D¼9n=°è[4Èa¾éè,QRäk0Z\"‹Œïv+{pxtê+qº*¡bGÉwßj/“ê#îèº€NmœR„–¶ÚjPgU(‹À‹<›«\0õ—¨X®p@v^~]MÊê¯üöÅÙ€»Ñ\r.òOK|Ÿ%ªÄeãÍ1éíwœb¼™ÏÌÃ—:é–_jg¿ÚØ\'mtvÜ-‰i=¹øŸ8ïè7;+ü<èhÇÍd\"_\0Mƒ|Âî£9WØëÛÛ°7õ”PÆ»\\vŞû&h¶7mwYh0™ì’­[}4í¹6ÌPŠ‹·ÉuèT7nÃŸM0	9ô²¶Z~îIÕ­Š’2<I;ÁÅó¸6~¶R/Ä¡¾rÛ™=üAFk[S¶f÷&®>ûéuùÑP®“±+1TZ¹Ñò¯eÍµ³\rzs`·ÛªŠP¥ÆÒ–~o·¸6è;õ=½›Šè1èÅ©ö”Ír·sÖ»HÇfC–úè±iÒ£3~İØó\'ı‘£)î—§î?8’4,ê|‚]ğûŠÇ5p«Æ»Æ¢u5ÆåDù-ÆÒiÁ/õ1OäÖ“O¯ÕöqÜ—–u)»“xp8¶…ÈŠ•m²Áî$&X(&*ßŞi*Sœ~IÀ–ÂM$Ã<5\"=K©OÍĞœÊ\\^—~›¶PÖÒ2c?ó¶‘îjÌ–HgÇë~…\0„àö˜¼sº¾Íc±èv—b`/àâ3÷Â_“6:/¯‡ÏæĞ^ß|ò|:¾8,ìN©‹•\0\0PNôËDê}€Š–z4tWòâX/µ†ğLÖÇûä\'†=ü÷6g.ïŸ˜ØQ£»[à¶ñÛG;´Ÿå$öe°®I	lBæXÄYPæ-§Zğx»6Ó*3~»”h1×ÿành•ö(ÍaK5‚)3‡Ç¶E\n_:B%Ö´t&Eq‘{\0R§µ2¦1ĞóbÙ˜Çè*#Ü²f‚´ëìÌ¿ÁWX{çÃxb‡²Úš;ª+>\\ˆÛ`qó\Zlïç£7}P©†1[R:—GÎĞ.í¬µàc–Ëş¾¥±³È7äqbb²¯St‹8‡§Ñ%˜cjË6Ÿ—)#‚8¹½İx$İç\\2¿à_åeè_•	Œ;íJÄü\\›…Jı¯k2ÿÿã¡,ñ_$KHKKC¿Ë²‡²Ä¡,q(KÊ‡²Ä¡,q(KÊ‡²Ä¡,q(KÊ‡²Ä¡,q(KÊ‡²Ä¡,q(KÊ‡²Ä“,ñû&şŸd		YTòÿ\'‡²Ä©,!#-#%Iúîù\0şÙY','2020-11-03 17:48:05'),(13,3,'audit/request','xœÅWmoÚHş|ı–?%UŒ_0/1íé|Æ€Àœ1m*UB‹½€SãumÓĞVùï7»ö\ZHh{§ûpŠ„¼³3³3ÏÌ<»A†Ú2¾çFÇ×1Ê·8{ÈPŒïO¹¡*†˜¨Øç	±Ø‹MQz ×\r1ÃŸ÷8/F…8c6j“ú­-É‘ª5\r¥Qc¬\Z1	PÌ„àsŸãLBœ”j\nØLÈ·(‘Üj(ÂÕ½ªö„q”ìÂ¡Û^¶õkÁLÓ¿Ç«»¨[ÍN£Ù®îFşd|#ÄÑ\',qğ‰\\Ö6#;,wÕ†ÒĞ]oÜjÂ­QUVb~@’Î—bœlŠ-•j†ØRèG¢œ²à …×òkfÕâr	\'	£dÃ“Ü|‹Ò!Ä\0`ŸéÆ(Ùì!Wvèâ\\²ç78ï}~«4nopÂ>ºÜU€‚-–htaxu\r1!3í{ñ5-e4bÀ\'\nP‘D~ÈIR%B²h±EKC†„`ƒ¦!Ëëíêa³ŠÖq”<¬ÂÍoƒ0V	ü†dGRW\n5İ¡D*È\'Ìü5Á»†›­u««KjĞÑ¤5Zé’Şn­$µnCú×¾íğ\0Òšd(q(¥$+*È»rµ{®\0ıñg<_UGh…Pjk¦}K•3Œb)JyK©­¡)PuUì=•Èp’$Ç\'-ªWúe_+„ÌºÔZ§\\å¹d•øKf“GÉ­AY/h·/Tí@„¥ú°fHäXUÅüªbMõeÅzB°EY‹· uY\Z4²¯zªIg­Lä˜T±^¥.èBï2¯«î‰!‹ÒÂªE†Q\ZŒ©‹«ka)œ¡íN\0)Å]d0€w¸Ø’hˆ3wîW‘D¹ù€boe(\\0;t¨`@9†KhÙ£|ƒ}†!ÂW©Ğ]ZDµ¦™?Iø•†À(æQÁÿÅ\0hzd\0õøşê7F>	ÚaÂÀxÂåù#ÉÂå–†Wíäâ«\'æ\"ïcy\n i4š®qtÙc%+İòÁ9ó\\•¬ôŞ{zbË¹í½³=ÖŸe~àÃ³ûg[şrî›şb^¥ô[\rÀÈ÷gËQ…ıe¢mUZğ¿4‡öÔÿßØÖr§>œ¿ÛÓ¡?:c[Zd¦iYöÌ?ç\\M9Û\\ÚSËí;Óá‰÷¹ÁØœû?aßnej™ÖÈ^Ò=wü\næ	ùföÏÚ¯ÎÎõœ¡3ı¯DÌC¤C71§Kß½³§ÿ–kŒî—×{oz}»O¿.Q)h«´Úx-f®çŸQ¾¦]Òò\\ß­ˆe[)/ÛE>2—/Úr•‰g›ã¥3»œ¥/³ìGUle(¡Aä/8	I&¯\"(MFH!7²£ŸmíóLfyËù³u½<n°r¹ªø¡şåÜNaĞ=ÖMì\r¤7Xş»™ÒÆ“µ†Şhv…«>^E(¹æìŠP!œ@˜Áİ*t•72·ÅÉ€Ÿä|@ÑæE¸ìŸ7oe45\'ö™æ¨göû/û¨ûLéE/Ğ=Ï¸¾}ÙÆî»ÖbBçÎs]¿\ZMV¯G¼â…÷ì¿öˆ¦¸ú¤™j2º÷¡ÙìsrSÓÆå›¿<I;ÉyRN¶\n¼Û;”8ûƒÁS?…)ş–ç\0%\r`Aç‰W9JB|h¤Ûô$.p¡+š®óãë+báùrõBÈOz{\rMß~o~X:œ70­²Ë Û¡#«å,œt›B«æ>:IµÖ	ÀÛ¹ıgÏ\0\Zl{àâò*¦æ!õh»ğœŸ…¬ÖhÕH“s„ ²ÙhL0\\V àòó|gb/c×„ C˜;¸¬´Vû¶Ùhµ›5œGUú¯ÎQ©Ìe›/Ç—Q)¨\"{«@smÿl¿„„Ú´·Ü;Ç>Š yÚó³÷ÖÜÏwÊeOãªc','2020-11-03 17:48:13'),(14,3,'audit/db','xœíYmOêHşî¯húİ(ÌLß¦CØ¤b½º‹p—ÂŞlBBG:j÷Ò–Û#÷Æÿ¾3-(Hñ® f×ÔDh;/çí9Og(äGB0‘–$ôš%r¨’>Qù•..@=!ŠNdç¬óE:í·ZR³Óê_´é´Û¹\\:õütÈÂ4¹rİ\'ÿcÀ?_ˆ ‘g¾?ğ.Í(hèòmÊâ™˜©Ô=u ªHÓM¥ªé˜j=\rsÑ”hBC•ÈWş˜É|GU#rN&µ[zQ\\»dûî_‡5.eÊÔ’xT³ÄUur3Éyì‡LEH¯g&_MÃQêG¡ç&Ë×,íÑË1sF7, â)—4\ZÓ$ÉfK†„!{XÊW¦³I¦\Z\"òÑ¯rışŞ\'š¤`TPÏnwp¦©oçL]ıPÎ4¤ áLcÙ™†Á¥;vËnöö$şç~MİªÛì´^×:o÷†mëÂv%Ë‘ÜQ&iLı0†4`îáê\n‡•ÙãiÌìÚ§v×n7í“aÏ:nÙKkbvÅb˜7L…ùÏ¯^¹´|Yú^\r?¼Šâ€\n_\r“Ì¯ÛõÎ­ÖğÑhg¾ßÈİû­sŞŞ°öwû¯…}Çú4WB¨)uÚ™ÎûÙg±_›VÏju>¹R#T<Öé>ì°ÿÌçÔÉ`µOÙl>ë Ûò@LŞr§yf_X…š-†6/ÎÃQ°4ØûrÆı½yß†äQzš°ıƒÜœ\\@”¢Y{F/Ã©!U–È ²¾Wá´]	ô8Cåô‹±à\\rFÉ%g<Ë[Ö&0ŒÅºjduË¤u.ş¼íØİÄƒ×Y­Õ8Rãhšò¼•ÜiÂâ¡ï‰K\">éßôN|ÇŒ{1I‡Ko¢l|3š2Ï=ş´Z}Û‘ö+ÓdJc?ª£k?¬fè=”*Ğ@Uª \nù3À|î8=~YA\0#€\"qsUL R9X\r(ë!ewlÄU.\nª Äó *›‚ªÿ.¨Aä±q’ÇÖŞ*0÷îz€ùxBoÙÓ¨.ÙrÌ³ÁâóoY—¢ØÛ[áŒ·Õ_3ÖÕçe~ü Õ²\n¼6Â™°A.hğ(h£9è\rrL1ÔBrŒ¾¢\r„,¥›Á_Ñ {ECø¿O·G}Qºé!¨–éV¦Û;¤›QÖ’€+\raM^K¿Ì[\"¯\\i^ºˆ›¬®lT¨ğLÙé‡†tø3¸«pÕ¿ûšÆş4Èı+ô©ú¡Çâ\"xÃ‚rÃ8\n×ñƒÚ9²ÿÈu~°wÒT-@ĞéŠ¯èó¥Ç³şÜõky	ˆ¼5R¹”¡XÁsİùïœ4Æc\'µ~Î‰Í‡GEŠm]q¤)Ş‰í€úãõ_ «Íë3íU¼UÙËŒ\r³Äp‰áí0¬)s^if\"ssg8ó¬k •˜-1»fu]1sŞÅ[avKÅ(%fKÌn…YŒÎx­ôr]-ÀeøC6€Ev<×ùÍÆw¬#L~Ú,9¹ääbNÖ=çdXrrÉÉ%\'?áäíêd@S+9¹ääí8c;a²ÌÉØ rÿó‰Õ³Ÿ¿8vOr½iœñÛ\0U¨š\nÀ&4M ëèPrDñlĞ;·¡@]C\0,:q¾ÇíxBi@EWı7ô.G&¸ 8o|d²ó±¹QpÌ“\'ûß_ó”aO&P`Ş+@ê;ãiË#8ÃĞy]Râé¿Š\'ë*¿¿ÿÊIìÂ','2020-11-03 17:48:13'),(15,3,'audit/log','xœíXmoÚHş_±âÉ©{ı¾ˆ“â´¹#ĞÃpÕIHØØ²¿P¿T¥UşûÍÚ@L0¹kiîC•Hãİ™yvæ™ñŒ]\"’¯)ÑI#¤iê.hÚè¸DÈWF¸RË‹”H*iØï†ĞÕ¤ßG½ar3°ÑÕhxƒ7÷Y6£Q–¬œF‡>2|0Èa‘4VŒMıù´‡¡ù„|Ìi²â¥ODUe¬¨†ÔRTM”õBØå¸J\n(“Æ-h4Ê\ni´İå²ı‰F~œ´çÔ§_Ø\"jƒ|^`i§‰×6ùUky·,„H#`åF1V;Å‰oóÈËXñu6,h6vçµ½;\Zºü.Xò7M‹Zå QD·¢ ™­–4L\Zç¿6:Œ(Ü’$	XÂî’Š/ğÉpI#-Ğåò¶ê\nWéÇ€ÜÅiÖ]xó™?ïøóÈ\r)ÿµçZ©!1h>à\\Uú©œ‹U`üT«ÎÕ4°n[}«7>AğçÜ{¹ÓrzÃ=™×ƒñl`ŞX2mä€çÓ,qY”Í¸“7»œã;»ƒ<Œjv¬+kd\rzÖåll^ô­ŠLBoiB#ú³Œÿyé=“ñªõ“2ïXt\'¡Ë}5K¿>ª_›ıÙã¡íµ>Ï9ùmx=8 û»õ×ÃÄ6ß®Ap˜h8(0Ÿßõ~í™c³?|ë na¨~m8Új8}FÅµ¼Ğ˜ƒËg”­w*Ïøæ!·{ï¬³Ùfé°p\ZÑbáäÃ;ğ÷a½]ä»z7¥§gåqJ%Sêv<ºJ§.jV\nms_Wí¶ãê±®éÆOT2dAÄXæ%Ã¨–Që×Û\Z„n¸ûD&qAÖ\"\'Oi2c>¿dKşíşí~æÿ\nNL³YH³»¸X÷êfÔwÎĞŸfbÙè´™§¹›°¸Ä5ßÜ}ƒš¢†[Xh	-î	pãıĞÃeX8ÅsABpZY\'¢Ô<{ö)°(ıL=@\\RMmRéPHí¿…4Œ}\Z¤ed-î¬šğ‚s÷Ãë©û‰>iå,\n&ìÿDGÔ‹ÿ@dË\'ëKâW´}øĞ%[TÕH`xclÊMcÓÒĞôÑĞÁãàÈ0I“kÏPRôJ²i6$µŞé$\rÒ]°e(½gË%õ	â¹…¢8Cê#µr]Zç<8&£I:åjú\\M™Sx¢œ‰ëú:1€S2úÛ-LY”T¡€)Uar§—múeİçr„Z×{ş£xw›®B>SiU¬\nÊ¿¦¥,îòÀ§÷YÂò°äÔ¾b‘O“º4kª,¤[í@Ô·ÀËü£Dı\r	xR¹†­Ó-HL@ôb5Yû~¯~¤±15åV¦¥•oÊ6I_c‡î0Kâ \0¦µ\'eéîmoÕ”}àX©>L¬ĞeÁ‘ø7Ö%CĞÊ1c§ÆÆá™­àòq”ÕDÍx¥ì+e¿‹²Š®*åÃa§ÓTùuz{Ş~ÊégÇsc[±~\\I6DU}-É¯%ù»J²¹ÓøyvúušîÉûKsl=™‹mkŒ?OŠ2äta~•\rIĞ\rÑ0UÅ0‡4Œ“Õ,„¹+‰ª‚aÓ>Ãİ•›e5hÜ%yMwü¿Ì²zMl^x–=úõŠV3—yàìËÿvèd¢¦—tRªt2 )5=¦)ÊbäÓyÓ^‚X\n×ƒ¹ÏÏ)_¹~\\ßOø>ø2à[h|GÑúm^Ù*¶¯Rğ†ZxC-cnpzûy@	G§w_¢©#˜¦IïŒPee(„ÿ\0Ëß.','2020-11-03 17:48:13'),(16,3,'audit/profiling','xœíZo¢Hş¿Ÿ‚øí¥Õ™f†1^B-İöÎêèm.1*Ó–[p³İM¿ûÍ\0¶ºb÷V»›»†&m‘ùñşzŞÇ—wp™Ê¾$³ZÀƒ(¾¯µ|¦B¬#\0Z	ÓX-õ^ky44 6¨®CHˆA¨.&P¹.IÜ[ÔZ.ƒ˜}ñWÙ…ÜB‡¬ÖŸóĞo•³Se\Z…!Ÿ¦~2%¸O>ÌØ]”¤íÛéõÄ»ny×¡pùIêÅ/-¹aÂÊj÷¾?ö®Ç§=X$¶Ît*B4\réØP:&ˆÛšT*WÅeº´T˜tãÏ„IâRgµ¦;Ÿ7?òĞ‹âæ5÷øgÿ6l\n9èÄ]x~ÚLâiÓ”Wùİ¼–»dæ‡\\ÊDç.¸Y„™:rŠ	·<º×3nOïxàÊ»BÒtæ&I6ƒ”XRlŞÏ3Õ«üZk=<øL—’TU%·¤¡/ç\\ïè\\\n(|MŞ¥\n¼?ä=zWYa_ôß)ç£nWéô»£«­œúWŠ“é?áa\Zß;›X…+:zŒ}Xğ\"»6ih¯Ê™h™3õ}œù„Íïs&Ö^•3\r©H:“¬:“!İ¶ºVgx ˆçıtá4œN¿gæeo8é™W–£˜¶âRHÒØõÃt\"óß9^_!ã°6{¶Â’™ëÜ\ZX½u6š§]keMÌoxÌÃ)÷&©4ÿùÕ\"W–¯J?È±á‡7Q¸ÒW“$óëÓvÃK³;y2Ú.ö›:¿õ/{[ÖşnıµÔad›o\n%¤šJ¿—é|˜ı-÷kÇšİşGig‚ÊÇúƒÇŸÙâÒVz2ÌŞÙ3›³²-ää-!·;Ö•YªÙrhûâ<%K³ƒwÂßÛ÷m++Bï&üğ(7\'#¥lÖÁ“Ñ«pj+õ2¨oîU:m_¦\0½\"ÎĞıR*9ƒVœQqFÅÏrÆu†Èkz¾Ğ\0ÖHVg@°J\Zñ—=Û\Z¼şz­&\ZG‹Tä­â,O|O^úsù×ıÛı$ÿÇ\\x1I\'Oï¢l|\Zs7ås¤üivG–­ÖÉÂı¨9‹nı°~œ¡÷X©C‚\Z4@Š{@ÜxÛ·‡â²\0\'\0Uæj”Aµ~ôü3cRş‰O…ÊeA%\0BZUİTü» ‘ÇgI[Kz«$ÀÂ»›ã‰û‘Õ[NE6˜bşG>àÓ(ö¶ÄV:ãÇê¯“MõE™?jµj€*/…¥°q&lœ\Z?	Újú9¦­Ô†£/hc+éFÄW4È¾¢!üß§[yá›é†BP«Ò­J·Ÿn¢¬%×\Z<Òš¼\"V~)Z2¯¥(]ä‡¬®l×]/™²×ƒF~î\Z\\÷¯Çß§±¿rÿJ}šç~èñ¸Ş°¤\\0Â\rÇBú¨vì?r¿Ø{iª• @êt#VŒÄÒÓûQáú¼¬¶5–RÆ¹”ïB±JİÅsN\ZG³“æ(çÄÎã­2Å¾©8ÒËïÇVàú³=õ_\"˜jõ™ş\"Ş©ì¦Ä¨0\\ax7ëjÁÂkÍLdlïg`Ş“u	ÒP…Ù\n³;acÕÈy—î„Ùy–R V˜­0»f)B4ãY´ÖË!X«\ZÀUøU6€ev<×ùÍÆ÷¬#¾Ù¬8¹âärNÖ	Î9Vœ\\qrÅÉ_qònu²\n ¡Wœ\\qònœL©‘½S‰Ö^ª¤„ÕFoÏÌ¡õÕñ‹m\rÇ[Ä9mĞ€š¡j@Ã\0£cÅÉß¡î\'§]¼E»ìÄù¸µç	%*Ö–ı7ôSLhIp~ğ‘ÉŞÇæ¤ä˜\'Owæ~ÉS†5<@…y¯\0i?O;Á‚E]Ráé¿Š\'bM|~ø&×±','2020-11-03 17:48:13');
/*!40000 ALTER TABLE `audit_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audit_entry`
--

DROP TABLE IF EXISTS `audit_entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audit_entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `user_id` int(11) DEFAULT 0,
  `duration` float DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `request_method` varchar(16) DEFAULT NULL,
  `ajax` int(1) NOT NULL DEFAULT 0,
  `route` varchar(255) DEFAULT NULL,
  `memory_max` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_route` (`route`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_entry`
--

LOCK TABLES `audit_entry` WRITE;
/*!40000 ALTER TABLE `audit_entry` DISABLE KEYS */;
INSERT INTO `audit_entry` VALUES (1,'2020-11-03 17:44:56',NULL,0.198084,'172.20.0.1','POST',0,'user/registration/register',3929376),(2,'2020-11-03 17:48:05',NULL,NULL,'172.20.0.1','POST',0,'usuario/login',NULL),(3,'2020-11-03 17:48:13',NULL,0.149309,'172.20.0.1','POST',0,'usuario/login',3165200);
/*!40000 ALTER TABLE `audit_entry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audit_error`
--

DROP TABLE IF EXISTS `audit_error`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audit_error` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `message` text NOT NULL,
  `code` int(11) DEFAULT 0,
  `file` varchar(512) DEFAULT NULL,
  `line` int(11) DEFAULT NULL,
  `trace` blob DEFAULT NULL,
  `hash` varchar(32) DEFAULT NULL,
  `emailed` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `fk_audit_error_entry_id` (`entry_id`),
  KEY `idx_file` (`file`(180)),
  KEY `idx_emailed` (`emailed`),
  CONSTRAINT `fk_audit_error_entry_id` FOREIGN KEY (`entry_id`) REFERENCES `audit_entry` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_error`
--

LOCK TABLES `audit_error` WRITE;
/*!40000 ALTER TABLE `audit_error` DISABLE KEYS */;
/*!40000 ALTER TABLE `audit_error` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audit_javascript`
--

DROP TABLE IF EXISTS `audit_javascript`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audit_javascript` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `type` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `origin` varchar(512) DEFAULT NULL,
  `data` blob DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_audit_javascript_entry_id` (`entry_id`),
  CONSTRAINT `fk_audit_javascript_entry_id` FOREIGN KEY (`entry_id`) REFERENCES `audit_entry` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_javascript`
--

LOCK TABLES `audit_javascript` WRITE;
/*!40000 ALTER TABLE `audit_javascript` DISABLE KEYS */;
/*!40000 ALTER TABLE `audit_javascript` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audit_mail`
--

DROP TABLE IF EXISTS `audit_mail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audit_mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `successful` int(11) NOT NULL,
  `from` varchar(255) DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `cc` varchar(255) DEFAULT NULL,
  `bcc` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `text` blob DEFAULT NULL,
  `html` blob DEFAULT NULL,
  `data` longblob DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_audit_mail_entry_id` (`entry_id`),
  CONSTRAINT `fk_audit_mail_entry_id` FOREIGN KEY (`entry_id`) REFERENCES `audit_entry` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_mail`
--

LOCK TABLES `audit_mail` WRITE;
/*!40000 ALTER TABLE `audit_mail` DISABLE KEYS */;
INSERT INTO `audit_mail` VALUES (1,1,'2020-11-03 17:44:56',1,'admin@example.com','admin@correo.com',NULL,NULL,NULL,'Bienvenido a My Application','xœ1\nÃ0EwBd’Í\nº\n9ª*°-#;CÕ©GÈÅêlŞãÿ\Z.óxX¤`Ù7ÉP2>w¼••©©eüV]\rÙ…Vš\0àu¸è)\\Xß§”ÚÙÜ¥sn~ü²²a1Gq7ûJ*QR¿‘Şh:¾Y¢M0\\ÿé„1','xœİXÛÓ0}ïWY!^6uºÛËJ°Z$.+(İxÚ\Z;8nÓòG<ğÄÀ1N«İ¤ Ô,ÎCÔ39ËI²Î½ã{Q\'èİ:q6xwù&.QpùúáÓ\'g„Œ½9>cì|po/ÏB«ÁÀrI\'æŠ±GÏ&Î¥Æò<oæÇMcÇlğ’Í½®–^MCW’l\n\'‚ÓF¯Øp(õ·¨iœœ,¥ÈÜBa?íÂO¤ZtàÎª:sxS¼sXzB7WóCx`%W‡‘a†VºPhÊä\'ì@+ŠnwAIáåxâèQ³İ…„Û±Ôˆºr!¤ûya7rqÚ\0\Z½Í2n&1OuÄ¤µë¹nÒ8“1†ÅM\0¬,é½ñãTÎúÁÙR*,R,ép8wÌ£Ğ…xÂm†®ÿzğ8¼­‰-íé\rXÀpel?8µıµìÂ‡$íW,MŒq“?®©“<Cq½È{Xè¹x?ÍH‡6\Z»P\0¶ÜnÉÄcKò]¸Ú©Ø|÷19>T±âÅ—\'Ì-O÷HÉ—í&EéÜ[]œ¨³õŠxXµ2¬Çœ¨Z·:mŸ=œÔØ ”‹±Ÿó2K§†ÊÄ*áœğy¸\nvDQPù3VÈ-IQ­	­>u¦-¶I¨Eº2£¤€ƒQä¯òQ€	9+#Fõf_¥¶\nÁ:^?ñ·œ7ß–Ù_Ë\\ß8ˆk£kšø›†Ö«ì4ôW£—ş[?îú`Şô£X’¯hc®Ê1\0^pÓÇ£øa£ÇÒÓFã¦Ùşj\nñ”jÔğlÒT‘Â„C&…Ø—áÍbıÊÍççåy^Iï’ÅX½[˜9b\"ÆZ¤¹ÂØÙï_µŒ\rPA´ÖX2Ê»Â„\0BZ#“ï_4*Ó\\¢ğG±]ékÿØ-%“5s­G0j¥»ÑqëT®­[zxåQ•ˆ¢­üe‹_w²fM¢ÆA°•şçô¯L×ÿS~wã¸]İRvù@ïæcMÁâ›ĞRå÷¹è?¦GÛéAñVÙƒvûo¸Â®ñíó:C:Š¢ænv‘„í$`“\0l4ÿRã¯VÔ:Åî†Ïüÿë?6‚îÕ1rx','xœÅX[sÚ8~g†ÿ ÒÙéÃÆØ€!Á@§iH\'iº-İËSFXÔÚ–+‹Kúë÷Ù\r¶	·Îš‡8¶ôéœï\\ôÉ‰×i·[^í–\'	rëıĞ#ıq³Ój·İN³ã^LÜF×o8.muyc|Î]ÊÜ74õ©?®Ò§ÁëjeH5÷ÈhÎÏˆÓ\"å‚4¦C\Zçëzíùİ«Zù<å¾öÈ[Á£“„’Û{rÇğ©2ªVŞ)z„²PDoøŠ†qÀë¾«•‘üùØ—Jq™>½}{mıÅU“=Ò¨Ã:W2Ò<ÒÖè>³Ây EL•¶i ¹Š`™ïU+d,ç£ê~P»Ü%K1ÑwãºÍ¶ÛíÜİsŞœ4ÚçM¿;æÜ¡~«í»¼{á¶\'m‡ÁœZµ‚?Ë:p~ÙRÍWÚ*¢ñgT%\\æzb]ä*\Z%®¬ëÈ—LDS|ŸKÍ™+i:xjÔèŞ|S)áQ‰k2£$Á øŠSFëéÌOŸ¼\0GŠûbŒCx¢9Iy\'<€(ªÁUkğ¶	_’X*Â•’êğ0`!,ÈaœqÔå0â Éú¯ l¦ÃàX¾ú/†\\şıtM|úòöÃû+R³lûïÖ•mGCòÏÍèöæ1˜	¤m_¬‘ÚLëØ³íårY?—­ºTS{ô§½B¸ÎÏn-›\\gšÕ |úfÑUDÉ 5ÜÖèv»)F$ú>à8r^Z\ZŠàŞ#¯nx°à\ZbK>ò9u–{ÿÜ˜¤ÿ‘K%h\0Ñc¬„+1é–ˆÀkÃq~ë‘@DÜšq1i,¬N„TMT™Ó#1¦Kuz©Dğ—ÀÕ9$\\DCcæBğ%¤ˆ®A™°àÃ¥`z7Œ/„XÜ2OjÄ.` ÿ>œ”-Ÿ	\0–%CkøeôÎºÈaÚ™‘ı±d÷d<õe ¼œtğW&°vç÷YríI~­%R3:”RÏÁ4Ò€(hÂÙzFÒViÈ,Ê¾Î€‰dÄ{Ä0™.C^@A÷\0Ñ#‹™õÑdÎ|4Mm? ‰IJäËZ*\Zï”~\0vCé´Ÿå<+;Zßtâ•qÀ„[«GÖØÉâ)~`v¬—B±ìêk¶¶“m¿Š~ÊBl¸ûUtÎÂ¾­YŞL[gVlS\\Õ\n5ôÎ\\Ïgî,‡s^v«jí	l¡°ÜÔÉ·Bú‡tee	Ôq O\n/ı€S³6=+ÍËH\"t®e)Šq˜×\0¸D‚‘—&Ìƒ5…†F&E¡}íŞÏí4e¸´ÎcNÊ>á}¾ÔJ’¬}¸SÚ1•úÚö|%­Ü72Óì}#3Ğë-fƒC•Á‹íPeğØârzìvõãÍQ@´“totÈ4LûÇ>™QËìI$UHƒ|5ÀùÆÔKÁßªI´=Óß};~mæW¶û]m_W¶ûÑÜÓ•ÔMÇ‡Ô´Í\'vÓY;şŒë’ôØ(\Z×Ñ°SDñ¡¥=œ…>¡ìx8áA(%è€ª0›qq{.¼µµÚğ\ncG.½1P°)å·úÒÎŸ(Ogn±,İŸ\0mG’y¼ö°¬]®‚CŸÚ]À>‘‹€vŠ])ó!b›à(;½}_Ê7Si+l\Z»©Å]’ĞN§ù°öR±ı-ò55”ÚI6Mc6¦ÛNé°“TÅÙ®V÷ª%=z¤-4ï£µ(ÆĞN£E	YãtèO—íŸYhÏ+»gkıŸ´÷UÌŒĞ@L#“L¸é)l»ÇŸ3ÕíÉé=º¿J3#Úî”77«4sŠöÈËËÑ-…«äèàª9¸ì–?ãÇúúg‹L©l$­¿Y‰lP!yò\0ÕÏ©R·şOÅ¨¿‘™ü™úÜmYÕJ­÷.ÍŸa');
/*!40000 ALTER TABLE `audit_mail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audit_trail`
--

DROP TABLE IF EXISTS `audit_trail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audit_trail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `model_id` varchar(255) NOT NULL,
  `field` varchar(255) DEFAULT NULL,
  `old_value` text DEFAULT NULL,
  `new_value` text DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_audit_trail_entry_id` (`entry_id`),
  KEY `idx_audit_user_id` (`user_id`),
  KEY `idx_audit_trail_field` (`model`,`model_id`,`field`),
  KEY `idx_audit_trail_action` (`action`),
  CONSTRAINT `fk_audit_trail_entry_id` FOREIGN KEY (`entry_id`) REFERENCES `audit_entry` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_trail`
--

LOCK TABLES `audit_trail` WRITE;
/*!40000 ALTER TABLE `audit_trail` DISABLE KEYS */;
/*!40000 ALTER TABLE `audit_trail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banco`
--

DROP TABLE IF EXISTS `banco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banco` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banco`
--

LOCK TABLES `banco` WRITE;
/*!40000 ALTER TABLE `banco` DISABLE KEYS */;
INSERT INTO `banco` VALUES (1,'Patagonia');
/*!40000 ALTER TABLE `banco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuenta`
--

DROP TABLE IF EXISTS `cuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuenta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cbu` varchar(45) NOT NULL,
  `personaid` int(11) NOT NULL,
  `bancoid` int(11) NOT NULL,
  `tipo_cuentaid` int(11) NOT NULL,
  `create_at` datetime DEFAULT NULL COMMENT ' Nos indica de donde fue dado de alta\n',
  `tesoreria_alta` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cbu_UNIQUE` (`cbu`),
  KEY `fk_cuenta_banco_idx` (`bancoid`),
  KEY `fk_cuenta_tipo_cuenta1_idx` (`tipo_cuentaid`),
  CONSTRAINT `fk_cuenta_banco` FOREIGN KEY (`bancoid`) REFERENCES `banco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cuenta_tipo_cuenta1` FOREIGN KEY (`tipo_cuentaid`) REFERENCES `tipo_cuenta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuenta`
--

LOCK TABLES `cuenta` WRITE;
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('bedezign\\yii2\\audit\\migrations\\m150626_000001_create_audit_entry',1604425456),('bedezign\\yii2\\audit\\migrations\\m150626_000002_create_audit_data',1604425457),('bedezign\\yii2\\audit\\migrations\\m150626_000003_create_audit_error',1604425459),('bedezign\\yii2\\audit\\migrations\\m150626_000004_create_audit_trail',1604425461),('bedezign\\yii2\\audit\\migrations\\m150626_000005_create_audit_javascript',1604425462),('bedezign\\yii2\\audit\\migrations\\m150626_000006_create_audit_mail',1604425463),('bedezign\\yii2\\audit\\migrations\\m150714_000001_alter_audit_data',1604425463),('bedezign\\yii2\\audit\\migrations\\m170126_000001_alter_audit_mail',1604425464),('m000000_000000_base',1604425436),('m140209_132017_init',1604425449),('m140403_174025_create_account_table',1604425450),('m140504_113157_update_tables',1604425451),('m140504_130429_create_token_table',1604425453),('m140830_171933_fix_ip_field',1604425453),('m140830_172703_change_account_table_name',1604425454),('m141222_110026_update_ip_field',1604425455),('m141222_135246_alter_username_length',1604425455),('m150614_103145_update_social_account_table',1604425455),('m150623_212711_fix_username_notnull',1604425455),('m151218_234654_add_timezone_to_profile',1604425463),('m160929_103127_add_last_login_at_to_user_table',1604425463);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prestacion`
--

DROP TABLE IF EXISTS `prestacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prestacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monto` double NOT NULL,
  `create_at` datetime NOT NULL,
  `proposito` text DEFAULT NULL,
  `observacion` text DEFAULT NULL,
  `sub_sucursalid` int(11) NOT NULL,
  `personaid` int(11) NOT NULL,
  `estado` tinyint(4) DEFAULT NULL COMMENT '0 - Sin CBU\n1 - Con CBU\n2 - En tesoreria',
  `fecha_ingreso` date NOT NULL COMMENT 'Esta fecha nos indica cuando fue la solicitud de esta prestacion\n',
  PRIMARY KEY (`id`),
  KEY `fk_prestacion_sub_sucursal1_idx` (`sub_sucursalid`),
  CONSTRAINT `fk_prestacion_sub_sucursal1` FOREIGN KEY (`sub_sucursalid`) REFERENCES `sub_sucursal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestacion`
--

LOCK TABLES `prestacion` WRITE;
/*!40000 ALTER TABLE `prestacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `prestacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_account`
--

DROP TABLE IF EXISTS `social_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  UNIQUE KEY `account_unique_code` (`code`),
  KEY `fk_user_account` (`user_id`),
  CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_account`
--

LOCK TABLES `social_account` WRITE;
/*!40000 ALTER TABLE `social_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_sucursal`
--

DROP TABLE IF EXISTS `sub_sucursal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_sucursal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `localidad` varchar(45) DEFAULT NULL,
  `codigo_postal` varchar(45) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `sucursalid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sub_sucursal_sucursal1_idx` (`sucursalid`),
  CONSTRAINT `fk_sub_sucursal_sucursal1` FOREIGN KEY (`sucursalid`) REFERENCES `sucursal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_sucursal`
--

LOCK TABLES `sub_sucursal` WRITE;
/*!40000 ALTER TABLE `sub_sucursal` DISABLE KEYS */;
INSERT INTO `sub_sucursal` VALUES (1,'Allen','8328','161014',14),(2,'Bariloche','8400','161399',3),(3,'Pilcaniyeu','8412','161355',3),(4,'C. Belisle','8364','161127',1),(5,'C. Cordero','8301','161124',1),(6,'Campo Grande','','',1),(7,'Catriel','8307','161073',11),(8,'Cervantes','8326','161085',2),(9,'Cinco Saltos','8303','161103',1),(10,'Cipoletti','8324','161104',13),(11,'Comallo','8416','161120',3),(12,'Chinchinales','8326','161095',4),(13,'Ing. Huergo','8334','161196',4),(14,'Mainque','8326','161296',4),(15,'Villa Regina','8336','161452',4),(16,'Chimpay','8364','161096',5),(17,'Choele Choel','8360','161099',5),(18,'Darwin','8364','161143',5),(19,'Lamarque','8363','161267',5),(20,'Pomona','8363','161359',5),(21,'El Bolson','8430','161147',15),(22,'Fernandez Oro','8324','161183',6),(23,'General Conesa','8503','161181',16),(24,'General E. Godoy','8336','161182',4),(25,'General Roca','8332','161187',2),(26,'Guardia Mitre','8505','161188',7),(27,'Patagones','8504','21965',7),(28,'San Javier','8501','',7),(29,'Viedma','8500','161446',7),(30,'Ingeniero Jacobacci','8418','161197',17),(31,'Los Menucos','8426','161286',8),(32,'Manquichao','8422','161301',8),(33,'Sierra Colorada','8534','161424',8),(34,'Luis Beltran','8361','161292',5),(35,'Ramos Mexia','8534','161309',9),(36,'Sierra Grande','8532','161426',9),(37,'Valcheta','8536','161442',9);
/*!40000 ALTER TABLE `sub_sucursal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sucursal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sucursal`
--

LOCK TABLES `sucursal` WRITE;
/*!40000 ALTER TABLE `sucursal` DISABLE KEYS */;
INSERT INTO `sucursal` VALUES (1,'Cinco Saltos','256'),(2,'General Roca','220'),(3,'Bariloche','255'),(4,'Villa Regina','253'),(5,'Choele Choel','264'),(6,'Fernandez Oro','388'),(7,'Viedma','250'),(8,'Los Menucos','387'),(9,'San Antonio Oeste','252'),(10,'Beltran','286'),(11,'Catriel','257'),(12,'Rio Colorado','258'),(13,'Cipoletti','251'),(14,'Allen','265'),(15,'El Bolson','263'),(16,'General Conesa','259'),(17,'Ing. Jacobacci','261');
/*!40000 ALTER TABLE `sucursal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_cuenta`
--

DROP TABLE IF EXISTS `tipo_cuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_cuenta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_cuenta`
--

LOCK TABLES `tipo_cuenta` WRITE;
/*!40000 ALTER TABLE `tipo_cuenta` DISABLE KEYS */;
INSERT INTO `tipo_cuenta` VALUES (1,'Cuenta Corriente'),(2,'Caja de Ahorro');
/*!40000 ALTER TABLE `tipo_cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `token`
--

DROP TABLE IF EXISTS `token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`),
  CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `token`
--

LOCK TABLES `token` WRITE;
/*!40000 ALTER TABLE `token` DISABLE KEYS */;
/*!40000 ALTER TABLE `token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT 0,
  `last_login_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_username` (`username`),
  UNIQUE KEY `user_unique_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','admin@correo.com','$2y$10$/T.AkPD.z3kDMtV0gMCu1uyyf8KnGYJQiDzJ0CeNPGy091iK5eRsW','sbkJe8GTYk9a8y_F52gvKHSN2_j83bQC',1604425496,NULL,NULL,'172.20.0.2',1604425496,1604425496,0,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-03 14:53:27

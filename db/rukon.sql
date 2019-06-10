-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2019 at 09:45 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rukon`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `board_name` varchar(100) NOT NULL,
  `board_content` text NOT NULL,
  `sid` text NOT NULL,
  `type` int(11) NOT NULL COMMENT '2 = private, 1 = public',
  `added` date NOT NULL,
  `default` int(11) NOT NULL DEFAULT '0' COMMENT '2 = not default, 1 = default',
  `verification_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`id`, `user_id`, `board_name`, `board_content`, `sid`, `type`, `added`, `default`, `verification_id`) VALUES
(3, 6, 'My board', '<div id="Content">\r\n<div id="bannerL"><div id="div-gpt-ad-1474537762122-2">\r\n<script type="text/javascript">googletag.cmd.push(function() { googletag.display("div-gpt-ad-1474537762122-2"); });</script>\r\n</div></div>\r\n<div id="bannerR"><div id="div-gpt-ad-1474537762122-3">\r\n<script type="text/javascript">googletag.cmd.push(function() { googletag.display("div-gpt-ad-1474537762122-3"); });</script>\r\n</div></div>\r\n<div id="Panes"><div>\r\n<h2>What is Lorem Ipsum?</h2>\r\n<div><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>\r\n</div><div>\r\n<h2>Why do we use it?</h2>\r\n<div>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</div>\r\n</div><br><div>\r\n<h2>Where does it come from?</h2>\r\n<div>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</div><div>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</div>\r\n</div><div>\r\n<h2>Where can I get some?</h2>\r\n<div>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</div>\r\n<form method="post" action="/feed/html"><table style="width:100%"><tbody><tr><td rowspan="2"><input type="text" name="amount" value="5" size="3" id="amount"></td><td rowspan="2"><table style="text-align:left"><tbody><tr><td style="width:20px"><input type="radio" name="what" value="paras" id="paras" checked="checked"></td><td><label for="paras">paragraphs</label></td></tr><tr><td style="width:20px"><input type="radio" name="what" value="words" id="words"></td><td><label for="words">words</label></td></tr><tr><td style="width:20px"><input type="radio" name="what" value="bytes" id="bytes"></td><td><label for="bytes">bytes</label></td></tr><tr><td style="width:20px"><input type="radio" name="what" value="lists" id="lists"></td><td><label for="lists">lists</label></td></tr></tbody></table></td><td style="width:20px"><input type="checkbox" name="start" id="start" value="yes" checked="checked"></td><td style="text-align:left"><label for="start">Start with ''Lorem<br>ipsum dolor sit amet...''</label></td></tr><tr><td></td><td style="text-align:left"><input type="submit" name="generate" id="generate" value="Generate Lorem Ipsum"></td></tr></tbody></table></form></div><br></div>\r\n<hr><div class="boxed" style="color:#ff0000;"><strong>Translations:</strong> Can you help translate this site into a foreign language ? Please email us with details if you can help.</div>\r\n\r\n<hr><div class="boxed">There are now a set of mock banners available <a href="/banners" class="lnk">here</a> in three colours and in a range of standard banner sizes:<br><a href="/banners"><img src="/images/banners/black_234x60.gif" width="234" height="60" alt="Banners"></a><a href="/banners"><img src="/images/banners/grey_234x60.gif" width="234" height="60" alt="Banners"></a><a href="/banners"><img src="/images/banners/white_234x60.gif" width="234" height="60" alt="Banners"></a></div>\r\n\r\n<hr><div class="boxed"><strong>Donate:</strong> If you use this site regularly and would like to help keep the site on the Internet, please consider donating a small sum to help pay for the hosting and bandwidth bill. There is no minimum donation, any sum is appreciated - click <a target="_blank" href="/donate" class="lnk">here</a> to donate using PayPal. Thank you for your support.</div>\r\n\r\n<hr><div class="boxed" id="Packages">\r\n<a target="_blank" rel="nofollow" href="https://addons.mozilla.org/en-US/firefox/addon/dummy-lipsum/">Firefox Add-on</a>\r\n<a target="_blank" rel="nofollow" href="https://github.com/traviskaufman/node-lipsum">NodeJS</a>\r\n<a target="_blank" rel="nofollow" href="http://ftp.ktug.or.kr/tex-archive/help/Catalogue/entries/lipsum.html">TeX Package</a>\r\n<a target="_blank" rel="nofollow" href="http://code.google.com/p/pypsum/">Python Interface</a>\r\n<a target="_blank" rel="nofollow" href="http://gtklipsum.sourceforge.net/">GTK Lipsum</a>\r\n<a target="_blank" rel="nofollow" href="http://github.com/gsavage/lorem_ipsum/tree/master">Rails</a>\r\n<a target="_blank" rel="nofollow" href="https://github.com/cerkit/LoremIpsum/">.NET</a>\r\n<a target="_blank" rel="nofollow" href="http://groovyconsole.appspot.com/script/64002">Groovy</a>\r\n<a target="_blank" rel="nofollow" href="http://www.layerhero.com/lorem-ipsum-generator/">Adobe Plugin</a></div>\r\n\r\n<hr><div id="Lipsum-Unit5" style="margin:10px 0">\r\n<script type="text/javascript">googletag.cmd.push(function() { googletag.display("Lipsum-Unit5"); });</script>\r\n</div>\r\n<hr><div id="Translation">\r\n\r\n<h3>The standard Lorem Ipsum passage, used since the 1500s</h3><div>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</div><h3>Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h3><div>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</div>\r\n<h3>1914 translation by H. Rackham</h3>\r\n<div>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</div>\r\n<h3>Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h3>\r\n<div>"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."</div>\r\n<h3>1914 translation by H. Rackham</h3>\r\n<div>"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."</div>\r\n</div>\r\n\r\n</div>', 'f7defebca5552196711454c76bcc9d8a792f4661', 2, '2019-04-02', 2, ''),
(5, 6, 'Test Board', 'Please Add your Board Content', '031b954fb32fcb4d2fc2e60bfc1356c9b78b0907', 1, '2019-04-02', 2, ''),
(6, 6, 'Bio Board', '<div><b>Monirul Islam</b></div><div><b>west rajabazar, Dhaka</b></div><div><b>01676707067</b></div><div><b>misujon58262@gmail.com</b></div><div><b><br></b></div><div><b><br></b></div><div><b><table class="table-1 table table-borderd"><tbody><tr><td>Institute Name</td><td>Pass Year</td><td>Grade</td></tr><tr><td><span style="font-weight: normal;">Brahmondi K, K, M, Govt. High School</span></td><td><span style="font-weight: normal;">2010</span></td><td><span style="font-weight: normal;">4.00</span></td></tr><tr><td><span style="font-weight: normal;">Narshingdi Govt. Collage</span></td><td><span style="font-weight: normal;">2014</span></td><td><span style="font-weight: normal;">4.30</span></td></tr></tbody></table><br></b></div><div><br></div><div><br></div><div><b>EDUCATION</b></div><div>Most recent/current schooling dates</div><div>Degree, department</div><div>(Dissertation title; course/degree descriptions)</div><div>Previous schooling dates</div><div>Degree, department</div><div><br></div><div><br></div><div><b>(DISSERTATION)</b></div><div>Title</div><div>Abstract</div><div>Committee chair/members</div><div><br></div><div><br></div><div><b>GRANTS AND FELLOWSHIPS (HONORS AND AWARDS)</b></div><div>Name, (significant info., amount), date</div><div>Name, (significant info., amount), date</div><div><br></div><div><br></div><div><b>RESEARCH EXPERIENCE</b></div><div>Title, school/organization, city, state dates</div><div>Description</div><div>Title, school/organization, city, state dates</div><div>Description</div><div><br></div><div><br></div><div><b>TEACHING EXPERIENCE</b></div><div>Title, school/organization, city, state dates</div><div>Course/s taught, description of duties</div><div>Title, school/organization, city, state dates</div><div>Course/s taught, description of duties</div><div><br></div><div><br></div><div><b>(RELEVANT WORK EXPERIENCE)</b></div><div>Title, company/organization, city, state dates</div><div>Description</div><div>Title, company/organization, city, state dates</div><div>Description</div><div>Last name, first initial, page #</div><div><br></div><div><br></div><div><b>UNIVERSITY SERVICE</b></div><div>Title, school/organization/group dates</div><div>Description</div><div>Title, school/organization/group dates</div><div>Description</div><div><br></div><div><br></div><div><b>PUBLICATIONS</b></div><div>Bibliographic format</div><div>Bibliographic format</div><div><br></div><div><br></div><div><b>MANUSCRIPTS IN PROGRESS</b></div><div>Bibliographic format (where you are at in the process)</div><div>Bibliographic format (where you are at in the process)</div><div><br></div><div><br></div><div><b>PRESENTATIONS AND POSTER SESSIONS</b></div><div>Bibliographic format</div><div>Bibliographic format</div><div><br></div><div><br></div><div><b>(PATENTS)</b></div><div>Item, date, number</div><div><br></div><div><br></div><div><b>(RESEARCH INTERESTS)</b></div><div>Research area</div><div>Research area</div><div><br></div><div><br></div><div><b>(TEACHING INTERESTS)</b></div><div>Class title or subject</div><div>Class title or subject</div><div><br></div><div><br></div><div><b>(PROFESSIONAL ASSOCIATIONS)</b></div><div>Title, association</div><div>Title, association</div><div><br></div><div><br></div><div><b>AT LEAST 3 REFERENCES</b></div><div>Name and Relationship</div><div>Address</div><div>Address</div><div>Phone #</div><div>Email</div>', '8ea983b01e1eed70d7ac03d2740b658134e059ce', 1, '2019-04-02', 1, '6, 7, 10'),
(7, 7, 'My CV Profile', '<div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><span style="font-weight: bolder;">Rukonuzzaman Rukon</span></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><span style="font-weight: bolder;">west rajabazar, Dhaka</span></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><span style="font-weight: bolder;">01676707068</span></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><span style="font-weight: bolder;">rukon@gmail.com</span></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><span style="font-weight: bolder;">EDUCATION</span></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Most recent/current schooling dates</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Degree, department</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">(Dissertation title; course/degree descriptions)</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Previous schooling dates</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Degree, department</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><span style="font-weight: bolder;">(DISSERTATION)</span></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Title</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Abstract</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Committee chair/members</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><span style="font-weight: bolder;">GRANTS AND FELLOWSHIPS (HONORS AND AWARDS)</span></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Name, (significant info., amount), date</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Name, (significant info., amount), date</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><span style="font-weight: bolder;">RESEARCH EXPERIENCE</span></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Title, school/organization, city, state dates</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Description</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Title, school/organization, city, state dates</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Description</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><span style="font-weight: bolder;">TEACHING EXPERIENCE</span></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Title, school/organization, city, state dates</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Course/s taught, description of duties</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Title, school/organization, city, state dates</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Course/s taught, description of duties</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><span style="font-weight: bolder;">(RELEVANT WORK EXPERIENCE)</span></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Title, company/organization, city, state dates</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Description</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Title, company/organization, city, state dates</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Description</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Last name, first initial, page #</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><span style="font-weight: bolder;">UNIVERSITY SERVICE</span></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Title, school/organization/group dates</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Description</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Title, school/organization/group dates</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Description</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><span style="font-weight: bolder;">PUBLICATIONS</span></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Bibliographic format</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Bibliographic format</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><span style="font-weight: bolder;">MANUSCRIPTS IN PROGRESS</span></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Bibliographic format (where you are at in the process)</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Bibliographic format (where you are at in the process)</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><span style="font-weight: bolder;">PRESENTATIONS AND POSTER SESSIONS</span></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Bibliographic format</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Bibliographic format</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><span style="font-weight: bolder;">(PATENTS)</span></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Item, date, number</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><span style="font-weight: bolder;">(RESEARCH INTERESTS)</span></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Research area</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Research area</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><span style="font-weight: bolder;">(TEACHING INTERESTS)</span></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Class title or subject</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Class title or subject</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><span style="font-weight: bolder;">(PROFESSIONAL ASSOCIATIONS)</span></div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Title, association</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;">Title, association</div><div style="color: rgb(82, 95, 127); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;"><br></div>', '469dec9bb5d9d4ad5bac982c5766deb789ab4e27', 1, '2019-04-03', 1, ''),
(18, 6, 'New Board', '<div><b>Monirul Islam</b></div><div><b>west rajabazar, Dhaka</b></div><div><b>01676707067</b></div><div><b>misujon58262@gmail.com</b></div><div><b><br></b></div><div><b><br></b></div><div><b><table class="table-1 table table-borderd"><tbody><tr><td>Institute Name</td><td>Pass Year</td><td>Grade</td></tr><tr><td><span style="font-weight: normal;">Brahmondi K, K, M, Govt. High School</span></td><td><span style="font-weight: normal;">2010</span></td><td><span style="font-weight: normal;">4.00</span></td></tr><tr><td><span style="font-weight: normal;">Narshingdi Govt. Collage</span></td><td><span style="font-weight: normal;">2014</span></td><td><span style="font-weight: normal;">4.30</span></td></tr></tbody></table><br></b></div><div><br></div><div><br></div><div><b>EDUCATION</b></div><div>Most recent/current schooling dates</div><div>Degree, department</div><div>(Dissertation title; course/degree descriptions)</div><div>Previous schooling dates</div><div>Degree, department</div><div><br></div><div><br></div><div><b>(DISSERTATION)</b></div><div>Title</div><div>Abstract</div><div>Committee chair/members</div><div><br></div><div><br></div><div><b>GRANTS AND FELLOWSHIPS (HONORS AND AWARDS)</b></div><div>Name, (significant info., amount), date</div><div>Name, (significant info., amount), date</div><div><br></div><div><br></div><div><b>RESEARCH EXPERIENCE</b></div><div>Title, school/organization, city, state dates</div><div>Description</div><div>Title, school/organization, city, state dates</div><div>Description</div><div><br></div><div><br></div><div><b>TEACHING EXPERIENCE</b></div><div>Title, school/organization, city, state dates</div><div>Course/s taught, description of duties</div><div>Title, school/organization, city, state dates</div><div>Course/s taught, description of duties</div><div><br></div><div><br></div><div><b>(RELEVANT WORK EXPERIENCE)</b></div><div>Title, company/organization, city, state dates</div><div>Description</div><div>Title, company/organization, city, state dates</div><div>Description</div><div>Last name, first initial, page #</div><div><br></div><div><br></div><div><b>UNIVERSITY SERVICE</b></div><div>Title, school/organization/group dates</div><div>Description</div><div>Title, school/organization/group dates</div><div>Description</div><div><br></div><div><br></div><div><b>PUBLICATIONS</b></div><div>Bibliographic format</div><div>Bibliographic format</div><div><br></div><div><br></div><div><b>MANUSCRIPTS IN PROGRESS</b></div><div>Bibliographic format (where you are at in the process)</div><div>Bibliographic format (where you are at in the process)</div><div><br></div><div><br></div><div><b>PRESENTATIONS AND POSTER SESSIONS</b></div><div>Bibliographic format</div><div>Bibliographic format</div><div><br></div><div><br></div><div><b>(PATENTS)</b></div><div>Item, date, number</div><div><br></div><div><br></div><div><b>(RESEARCH INTERESTS)</b></div><div>Research area</div><div>Research area</div><div><br></div><div><br></div><div><b>(TEACHING INTERESTS)</b></div><div>Class title or subject</div><div>Class title or subject</div><div><br></div><div><br></div><div><b>(PROFESSIONAL ASSOCIATIONS)</b></div><div>Title, association</div><div>Title, association</div><div><br></div><div><br></div><div><b>AT LEAST 3 REFERENCES</b></div><div>Name and Relationship</div><div>Address</div><div>Address</div><div>Phone #</div><div>Email</div>', 'ed9347b66a601d1d62faee7de95381a88f416bea', 1, '2019-04-08', 2, '4, 7');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `pass` text NOT NULL,
  `phone` varchar(11) NOT NULL,
  `started` date NOT NULL,
  `country` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `main_task` varchar(100) NOT NULL,
  `logo` text NOT NULL,
  `type` varchar(50) NOT NULL COMMENT '1=top level, 2 = sub level',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 = pending, 1 = activated',
  `signup_date` date NOT NULL,
  `mypoints` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `email`, `pass`, `phone`, `started`, `country`, `address`, `main_task`, `logo`, `type`, `status`, `signup_date`, `mypoints`) VALUES
(3, 'Shamima Institiute', 'shamima@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1676707067', '2019-01-01', 'Bangladesh', 'Mirpur, Dhaka', 'Graphics Designing', '922dbc1814bf9f4a4833627341e8f854WordPress-Logo-Download-PNG.png', 'sublevel', 1, '2019-04-07', 10),
(4, 'www.misujon.com', 'contact@misujon.com', '202cb962ac59075b964b07152d234b70', '01676707078', '2014-06-20', 'Bangladesh', 'Firmgate, Dhaka', 'Software Development', '82109f4ad6b325c60a143ead867f2f6chappy-farmer-char-640.jpg', 'toplevel', 1, '2019-04-07', 0),
(5, 'Shariful Islam Akash', 'akash@gmail.com', '202cb962ac59075b964b07152d234b70', '1711225649', '2009-06-20', 'Bangladesh', 'Aftabnagar', 'Lawyer', '8e1062784383d0ee36022b880a7cac27mysql_PNG10.png', 'sublevel', 1, '2019-04-08', 40),
(6, 'new verifier', 'newv@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01676707067', '2019-01-01', 'Bangladesh', '43/1, Bilashdi, Narshingdi', 'Web Development', '16aafc5530b099a7788f540e7b1b8d1aangular-6-458222.png', 'sublevel', 1, '2019-05-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `verific_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `verifier_id` int(11) NOT NULL,
  `user_type` varchar(11) NOT NULL COMMENT '1 = "user"; 1="verifier"',
  `is_read` int(11) NOT NULL DEFAULT '0' COMMENT '0 = new; 1= read;',
  `notify_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `verific_id`, `user_id`, `verifier_id`, `user_type`, `is_read`, `notify_time`) VALUES
(1, 11, 6, 5, '1', 1, '2019-05-21 23:56:32'),
(2, 12, 6, 5, '1', 1, '2019-05-22 01:34:03'),
(3, 13, 6, 5, '1', 1, '2019-05-22 01:34:16'),
(4, 14, 6, 3, '1', 1, '2019-05-22 01:34:35'),
(5, 13, 3, 4, '2', 0, '2019-05-22 01:36:05'),
(6, 14, 3, 4, '2', 0, '2019-05-22 01:36:17');

-- --------------------------------------------------------

--
-- Table structure for table `point_package`
--

CREATE TABLE `point_package` (
  `pk_id` int(11) NOT NULL,
  `pk_title` text NOT NULL,
  `pk_point` int(11) NOT NULL,
  `pk_price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `pk_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `point_package`
--

INSERT INTO `point_package` (`pk_id`, `pk_title`, `pk_point`, `pk_price`, `status`, `pk_added`) VALUES
(1, 'Basic', 10, 100, 1, '2019-05-09 16:02:08'),
(2, 'Premium', 20, 150, 1, '2019-05-09 16:02:08'),
(3, 'Ultimate', 40, 230, 1, '2019-05-09 16:02:48'),
(4, 'New Package', 55, 400, 0, '2019-05-12 13:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `super-admin`
--

CREATE TABLE `super-admin` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `pass` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 = Activated; 2 = Deactivated;',
  `type` int(11) NOT NULL DEFAULT '2' COMMENT '1 = Super-admin; 2 = Admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super-admin`
--

INSERT INTO `super-admin` (`id`, `email`, `pass`, `status`, `type`) VALUES
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `pass` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `country` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `designation` varchar(100) NOT NULL,
  `bio` text NOT NULL,
  `picture` text NOT NULL,
  `signup_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 = Not Active, 1 = Active',
  `mypoints` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `phone`, `dob`, `country`, `address`, `designation`, `bio`, `picture`, `signup_date`, `status`, `mypoints`) VALUES
(6, 'Monirul Islam', 'misujon@zoho.com', '827ccb0eea8a706c4c34a16891f84e7b', '01676707078', '1970-01-01', 'Bangladesh', '43/1, Bilashdi, Narshingdi', 'Web Design and Developer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'b3dc131327760dbd5c80f52b1588591a3D-Design-e1550766529664.png', '2019-03-31', 1, 20),
(7, 'Rukon', 'rukon@gmail.com', '202cb962ac59075b964b07152d234b70', '01676707068', '1995-02-12', 'Bangladesh', 'west rajabazar', 'Software Tester', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '6a455f6973af25cd4f0ff542ae320a52Working-from-home-1.jpg', '2019-04-01', 1, 0),
(8, 'Monirul Islam 1', 'misujon1@zoho.com', '827ccb0eea8a706c4c34a16891f84e7b', '01676707078', '1970-01-01', 'Bangladesh', '43/1, Bilashdi, Narshingdi', 'Web Design and Developer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'c1eb0f09f08cea351c17249a3dd76c7elondon-tower-bridge-bridge-monument-51363-600x400.jpeg', '2019-03-31', 1, 0),
(9, 'Rukon 1', 'rukon1@gmail.com', '202cb962ac59075b964b07152d234b70', '01676707068', '1995-02-12', 'Bangladesh', 'west rajabazar', 'Software Tester', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '6a455f6973af25cd4f0ff542ae320a52Working-from-home-1.jpg', '2019-04-01', 1, 0),
(10, 'Monirul Islam 2', 'misujon2@zoho.com', '827ccb0eea8a706c4c34a16891f84e7b', '01676707078', '1970-01-01', 'Bangladesh', '43/1, Bilashdi, Narshingdi', 'Web Design and Developer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'c1eb0f09f08cea351c17249a3dd76c7elondon-tower-bridge-bridge-monument-51363-600x400.jpeg', '2019-03-31', 1, 0),
(11, 'Rukon 2', 'rukon2@gmail.com', '202cb962ac59075b964b07152d234b70', '01676707068', '1995-02-12', 'Bangladesh', 'west rajabazar', 'Software Tester', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '6a455f6973af25cd4f0ff542ae320a52Working-from-home-1.jpg', '2019-04-01', 1, 0),
(12, 'Monirul Islam 3', 'misujon3@zoho.com', '827ccb0eea8a706c4c34a16891f84e7b', '01676707078', '1970-01-01', 'Bangladesh', '43/1, Bilashdi, Narshingdi', 'Web Design and Developer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'c1eb0f09f08cea351c17249a3dd76c7elondon-tower-bridge-bridge-monument-51363-600x400.jpeg', '2019-03-31', 1, 0),
(13, 'Rukon 4', 'rukon4@gmail.com', '202cb962ac59075b964b07152d234b70', '01676707068', '1995-02-12', 'Bangladesh', 'west rajabazar', 'Software Tester', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '6a455f6973af25cd4f0ff542ae320a52Working-from-home-1.jpg', '2019-04-01', 1, 0),
(14, 'Monirul Islam 5', 'misujon5@zoho.com', '827ccb0eea8a706c4c34a16891f84e7b', '01676707078', '1970-01-01', 'Bangladesh', '43/1, Bilashdi, Narshingdi', 'Web Design and Developer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'c1eb0f09f08cea351c17249a3dd76c7elondon-tower-bridge-bridge-monument-51363-600x400.jpeg', '2019-03-31', 1, 0),
(15, 'Rukon 6', 'rukon6@gmail.com', '202cb962ac59075b964b07152d234b70', '01676707068', '1995-02-12', 'Bangladesh', 'west rajabazar', 'Software Tester', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '6a455f6973af25cd4f0ff542ae320a52Working-from-home-1.jpg', '2019-04-01', 1, 0),
(16, 'Monirul Islam 7', 'misujon7@zoho.com', '827ccb0eea8a706c4c34a16891f84e7b', '01676707078', '1970-01-01', 'Bangladesh', '43/1, Bilashdi, Narshingdi', 'Web Design and Developer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'c1eb0f09f08cea351c17249a3dd76c7elondon-tower-bridge-bridge-monument-51363-600x400.jpeg', '2019-03-31', 1, 0),
(17, 'Rukon 8', 'rukon8@gmail.com', '202cb962ac59075b964b07152d234b70', '01676707068', '1995-02-12', 'Bangladesh', 'west rajabazar', 'Software Tester', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '6a455f6973af25cd4f0ff542ae320a52Working-from-home-1.jpg', '2019-04-01', 1, 0),
(18, 'Monirul Islam 9', 'misujon9@zoho.com', '827ccb0eea8a706c4c34a16891f84e7b', '01676707078', '1970-01-01', 'Bangladesh', '43/1, Bilashdi, Narshingdi', 'Web Design and Developer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'c1eb0f09f08cea351c17249a3dd76c7elondon-tower-bridge-bridge-monument-51363-600x400.jpeg', '2019-03-31', 1, 0),
(19, 'Rukon 10', 'rukon10@gmail.com', '202cb962ac59075b964b07152d234b70', '01676707068', '1995-02-12', 'Bangladesh', 'west rajabazar', 'Software Tester', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '6a455f6973af25cd4f0ff542ae320a52Working-from-home-1.jpg', '2019-04-01', 1, 0),
(20, 'Monirul Islam 11', 'misujon11@zoho.com', '827ccb0eea8a706c4c34a16891f84e7b', '01676707078', '1970-01-01', 'Bangladesh', '43/1, Bilashdi, Narshingdi', 'Web Design and Developer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'c1eb0f09f08cea351c17249a3dd76c7elondon-tower-bridge-bridge-monument-51363-600x400.jpeg', '2019-03-31', 1, 0),
(21, 'Rukon 12', 'rukon12@gmail.com', '202cb962ac59075b964b07152d234b70', '01676707068', '1995-02-12', 'Bangladesh', 'west rajabazar', 'Software Tester', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '6a455f6973af25cd4f0ff542ae320a52Working-from-home-1.jpg', '2019-04-01', 1, 0),
(22, 'Test User', 'test@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01676707067', '1994-06-20', 'Bangladesh', '43/1, Bilashdi, Narshingdi', 'Web Design and Developer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '7b35313779c694fd92df299430dead2dDSC_6687=[1].JPG', '2019-05-21', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_got_points`
--

CREATE TABLE `user_got_points` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `point_pkg_id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_number` varchar(20) NOT NULL,
  `c_expiry` date NOT NULL,
  `c_cvv` int(3) NOT NULL,
  `pkg_active` int(11) NOT NULL COMMENT '1 = Activated; 2= Deactivated',
  `package_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_got_points`
--

INSERT INTO `user_got_points` (`id`, `user_id`, `point_pkg_id`, `point`, `c_name`, `c_number`, `c_expiry`, `c_cvv`, `pkg_active`, `package_date`) VALUES
(5, 6, 2, 20, 'Monirul Islam', '1234567812345678', '2019-05-31', 123, 1, '2019-05-10 01:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `req_doc_info` varchar(100) NOT NULL,
  `req_doc` text NOT NULL,
  `doc_status` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Not Verified, 1 = pending, 2 = Verified',
  `req_submitted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`id`, `user_id`, `com_id`, `req_doc_info`, `req_doc`, `doc_status`, `req_submitted`) VALUES
(2, 7, 3, 'Collage Certificate', '7b3833027dd21e420d5ff8fdefcb72cdCollageCertificate-3d-modeling-on-ritdesigns.png, 7b3833027dd21e420d5ff8fdefcb72cdCollageCertificate-421.jpg, 7b3833027dd21e420d5ff8fdefcb72cdCollageCertificate-pm_kerry_1.jpg', 2, '2019-04-03'),
(3, 7, 3, 'School Certificate', '121406597111180526a00cd64038e6afCollageCertificate-rynWWh5.jpg, 121406597111180526a00cd64038e6afCollageCertificate-vaida-tamosauskaite-85608-1024x682.jpg', 2, '2019-04-03'),
(4, 6, 3, 'Collage Certificate', '713ed60c37f4bebb1217a1b0c20bdeddCollageCertificate-frances-gunn-41736-1024x683.jpg, 713ed60c37f4bebb1217a1b0c20bdeddCollageCertificate-happy-businesswoman-working-on-her-laptop-in-the-office_b0zxvt7ke_thumbnail-full01.png', 2, '2019-04-03'),
(5, 6, 3, 'University Certificates', 'd04c759885f3d4ca74d56d6020d16275UniversityCertificates-london-tower-bridge-bridge-monument-51363-600x400.jpeg, d04c759885f3d4ca74d56d6020d16275UniversityCertificates-pexels-photo-67474-600x400.jpeg, d04c759885f3d4ca74d56d6020d16275UniversityCertificates-remote-worker.jpg, d04c759885f3d4ca74d56d6020d16275UniversityCertificates-vaida-tamosauskaite-85608-1024x682.jpg', 1, '2019-04-03'),
(6, 6, 3, 'User Picture', '4fe90b8c9b2499c6320af7d3c62530b2UserPicture-rynWWh5.jpg', 1, '2019-04-04'),
(7, 6, 3, 'University Certificates', '0eb2b43915eed254a3be696189999255UniversityCertificates-14862408852_d9fe7e864b_k-1024x683.jpg, 0eb2b43915eed254a3be696189999255UniversityCertificates-19234335542_9c6c1b1799_k-600x400.jpg, 0eb2b43915eed254a3be696189999255UniversityCertificates-B0J3yRy.jpg', 0, '2019-04-08'),
(8, 14, 5, 'School Certificates', '38b6e09f1e00aa42bd9349ffee64911fSchoolCertificates-1.jpg, 38b6e09f1e00aa42bd9349ffee64911fSchoolCertificates-1_i607ZGRiS33cjjvLUK8QPA.png, 38b6e09f1e00aa42bd9349ffee64911fSchoolCertificates-1_lJ32Bl-lHWmNMUSiSq17gQ.png', 2, '2019-04-08'),
(9, 14, 3, 'University Certificates', 'c9953eda5c733c8f0ac23225ae2df656UniversityCertificates-anthony-delanoix-48936-1024x683.jpg, c9953eda5c733c8f0ac23225ae2df656UniversityCertificates-banner_mobile.png, c9953eda5c733c8f0ac23225ae2df656UniversityCertificates-bd.jpg', 2, '2019-04-08'),
(10, 6, 5, 'Trade Lisence', '34d057b6a8f539c4e4766eccd9a97265TradeLisence-59457753_407336866755875_3138813356056510464_n.jpg', 2, '2019-05-09'),
(11, 6, 5, 'My External Certificate', '78b013e4564c6cff692cbaefd154c62eMyExternalCertificate-A.H.Rifat_National_Identity_Card.jpeg', 0, '2019-05-21'),
(12, 6, 5, 'Collage Certificate', '3dca000fed332c358ba0390f4e1b526bCollageCertificate-2.png', 0, '2019-05-21'),
(13, 6, 5, 'Trade Lisence', '084079ccad05eacec6dae4dfd8c13f72TradeLisence-3.jpeg', 0, '2019-05-21'),
(14, 6, 3, 'Tin Certificate', 'a9eff5ac38187d8e5ec0483321eb0c18TinCertificate-59457753_407336866755875_3138813356056510464_n.jpg', 0, '2019-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `verification_v`
--

CREATE TABLE `verification_v` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `req_doc_info` varchar(100) NOT NULL,
  `req_doc` text NOT NULL,
  `doc_status` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Not Verified, 1 = pending, 2 = Verified',
  `req_submitted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verification_v`
--

INSERT INTO `verification_v` (`id`, `user_id`, `com_id`, `req_doc_info`, `req_doc`, `doc_status`, `req_submitted`) VALUES
(11, 3, 4, 'Trade Lisence', '4b4134a44b3c771a56d516721a635984TradeLisence-main-qimg-a346c416c22e18d53d3c0cd8389637b7.png', 2, '2019-04-08'),
(12, 5, 4, 'Tin Certificate', '023835658ab7d143c1b45865f848b4baTinCertificate-Working-from-home-1.jpg', 2, '2019-04-08'),
(13, 3, 4, 'Trade Lisence', 'bd4350ae9305a864a45ec515189b3a94TradeLisence-__ one of the best, easiest, toughest decisions you will ever make for yourself.jpg', 0, '2019-05-21'),
(14, 3, 4, 'School Certificates', '1f1756be6466b6ad470af06193371ef5SchoolCertificates-3d-modeling-on-ritdesigns.png', 0, '2019-05-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point_package`
--
ALTER TABLE `point_package`
  ADD PRIMARY KEY (`pk_id`);

--
-- Indexes for table `super-admin`
--
ALTER TABLE `super-admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_got_points`
--
ALTER TABLE `user_got_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification_v`
--
ALTER TABLE `verification_v`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `point_package`
--
ALTER TABLE `point_package`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `super-admin`
--
ALTER TABLE `super-admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user_got_points`
--
ALTER TABLE `user_got_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `verification_v`
--
ALTER TABLE `verification_v`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

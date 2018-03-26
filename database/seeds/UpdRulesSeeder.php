<?php
use Illuminate\Database\Seeder;

class UpdRulesSeeder extends Seeder {
    
    public function run() {
                
                        
        \DB::table('upd_rules')->insert([
            
            [
			'id' => '1', 
			'type' => 'body', 
			'name' => 'HSC_RULE_URI_', 
			'value' => 'uri HSC_RULE_URI_1001   /djdeetail/i
score HSC_RULE_URI_1001 6.0', 
			'created_at' => '2011-12-22 14:05:59', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '2', 
			'type' => 'uri', 
			'name' => 'HSC_RULE_URI_', 
			'value' => 'uri HSC_RULE_URI_1002   /globaldirectorcenter\.com/i
score HSC_RULE_URI_1002 6.0', 
			'created_at' => '2011-12-22 14:18:19', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '3', 
			'type' => 'uri', 
			'name' => 'HSC_RULE_URI_', 
			'value' => 'uri HSC_RULE_URI_0133   /lacadordeofertas\.com/i
score HSC_RULE_URI_0133 6.0', 
			'created_at' => '2012-02-29 10:42:57', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '4', 
			'type' => 'body', 
			'name' => 'HSC_BR_LACADOR_
', 
			'value' => 'body HSC_BR_LACADOR_01     /La�ador de Ofertas/i
score HSC_BR_LACADOR_01     6.0', 
			'created_at' => '2012-02-29 10:45:53', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '5', 
			'type' => 'uri', 
			'name' => 'HSC_RULE_URI_
', 
			'value' => 'uri HSC_RULE_URI_0101   /InstaladorSeguranca\.exe/i
score HSC_RULE_URI_0101 6.0
', 
			'created_at' => '2011-01-31 15:50:28', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '6', 
			'type' => 'uri', 
			'name' => 'HSC_RULE_
', 
			'value' => 'uri HSC_RULE_0001 /veja_extrato\.zip/i
score HSC_RULE_0001  6.8
', 
			'created_at' => '2011-01-31 15:50:33', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '7', 
			'type' => 'uri', 
			'name' => 'HSC_GEO_STRING
', 
			'value' => 'uri      HSC_GEO_STRING2   /^http:\/\/(?:\w{1,5}\.)?geocities(?:\.yahoo)?\.com(?:\.\w{1,5})?(?::\d*)?\/.+?/i
describe HSC_GEO_STRING2      Use of geocities/yahoo very likely spam as of Dec 2005
score    HSC_GEO_STRING2      4.7
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '8', 
			'type' => 'uri', 
			'name' => 'HSC_GOOGLE_STRING
', 
			'value' => 'uri      HSC_GOOGLE_STRING /^http:\/\/www.google.com\/url\?q=/i
describe HSC_GOOGLE_STRING Use of Google redir appearing in spam July 2006
score    HSC_GOOGLE_STRING 1.0
', 
			'created_at' => '2011-01-31 15:50:37', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '9', 
			'type' => 'uri', 
			'name' => 'HSC_URIPARSE
', 
			'value' => 'uri      HSC_URIPARSE       /(\%0[01]|\0).{1,100}\@/i
describe    HSC_URIPARSE    Attempted use of URI bug-high probability of fraud
score       HSC_URIPARSE     7.0
', 
			'created_at' => '2011-01-31 15:50:41', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '10', 
			'type' => 'uri', 
			'name' => 'HSC_WEBS
', 
			'value' => 'uri      HSC_WEBS /.{3,25}\.webs.com/i
score    HSC_WEBS 0.5
describe HSC_WEBS webs.com links used in Spams
', 
			'created_at' => '2011-01-31 15:50:52', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '11', 
			'type' => 'uri', 
			'name' => 'HSC_BADSWF
', 
			'value' => 'uri             HSC_BADSWF /imageshack.us\/.{3,25}.swf$/i
score    HSC_BADSWF  3.0
describe HSC_BADSWF  SWF embedded links in Email Scams
', 
			'created_at' => '2011-01-31 15:51:11', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '12', 
			'type' => 'uri', 
			'name' => 'HSC_DANGEROUS_URL_EXTENSIONS
', 
			'value' => 'uri HSC_DANGEROUS_URL_EXTENSIONS /(http|https|ftp):\/\/.*\/.*\.(exe|scr|pif|cmd|bat|vbs|wsh).*$/i
describe HSC_DANGEROUS_URL_EXTENSIONS URL contains executable content
score HSC_DANGEROUS_URL_EXTENSIONS 2.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '13', 
			'type' => 'uri', 
			'name' => 'HSC_MXURI', 
			'value' => 'uri      HSC_MXURI   /^(?:http:\/\/)?(mail|mx)\./i
score    HSC_MXURI   0.8
describe HSC_MXURI   URI begins with a mail exchange prefix, i.e. mx.[...]
', 
			'created_at' => '2015-04-29 09:48:19', 
			'updated_at' => '2015-04-29 09:48:19', 
			'deleted_at' => '2018-03-26 19:33:12', 
            ],
            [
			'id' => '14', 
			'type' => 'uri', 
			'name' => '__HSC_LIVE
', 
			'value' => 'uri             __HSC_LIVE1              /^http:\/\/.{0,20}\.(blogspot|livejournal)\.com/i
meta            HSC_LIVE          (__HSC_LIVE1)
describe        HSC_LIVE         blogspot.com & livejournal.com likely spam (Apr 2010)
score           HSC_LIVE         2.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '15', 
			'type' => 'uri', 
			'name' => 'HSC_DANGEROUS_URL_EXTENSIONS
', 
			'value' => 'uri HSC_DANGEROUS_URL_EXTENSIONS2 /(http|https|ftp):\/\/.*\/.*\.(com)$/i
describe HSC_DANGEROUS_URL_EXTENSIONS2 URL contains .com to download
score HSC_DANGEROUS_URL_EXTENSIONS2 0.0001
', 
			'created_at' => '2015-02-03 16:10:59', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '16', 
			'type' => 'body', 
			'name' => 'HSC_RULE_
', 
			'value' => 'body HSC_RULE_0002   /Comunicamos que consta em nosso banco de dados varias pendencias financeiras em seu CPF \/ CNPJ/i
score HSC_RULE_0002  6.8
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '17', 
			'type' => 'body', 
			'name' => 'HSC_RULE_
', 
			'value' => 'body HSC_RULE_0003      /(equipe)(.*camargo)(.*correa)/i
score HSC_RULE_0003     6.8
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '18', 
			'type' => 'body', 
			'name' => 'HSC_RULE_
', 
			'value' => 'body HSC_RULE_0004      /(contamos)(.*proposta)(.*realizarmos)/i
score HSC_RULE_0004     6.8
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '19', 
			'type' => 'body', 
			'name' => 'HSC_RULE_
', 
			'value' => 'body HSC_RULE_0005      /ANTI-SPAM DA MICROSOFT suporte\@microsoft.com/i
score HSC_RULE_0005     6.8
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '20', 
			'type' => 'body', 
			'name' => 'HSC_RULE_
', 
			'value' => 'body HSC_RULE_0006      /Equipe de Tecnologia e Desenvolvimento Microsoft/i
score HSC_RULE_0006     6.8
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '21', 
			'type' => 'body', 
			'name' => 'HSC_OVERPAY
', 
			'value' => 'body     HSC_OVERPAY /O . V . E . R . P . A . Y/i
describe HSC_OVERPAY Common Medicinal Ad Trick
score    HSC_OVERPAY 3.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '22', 
			'type' => 'body', 
			'name' => 'HSC_VIAGRA
', 
			'value' => 'body            HSC_VIAGRA1     /V I A G R A|C I A L I S|V A L I U M|X A N A X/i
describe        HSC_VIAGRA1     Common Viagra and Medicinal Table Trick
score           HSC_VIAGRA1     3.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '23', 
			'type' => 'body', 
			'name' => 'HSC_VIAGRA
', 
			'value' => 'body            HSC_VIAGRA2     /(?:Xan|Som|CIA|VAL|VIA|Pro|Amb|Lev|Mer) (?:Xan|Som|CIA|VAL|VIA|Pro|Amb|Lev|Mer) (?:Xan|Som|CIA|VAL|VIA|Pro|Amb|Lev|Mer)/i
describe        HSC_VIAGRA2     Common Viagra and Medicinal Table Trick
score           HSC_VIAGRA2     3.1
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '24', 
			'type' => 'body', 
			'name' => 'HSC_VIAGRA
', 
			'value' => 'body            HSC_VIAGRA3     /(?:Xan|Som|CIA|VAL|VIA|Pro|Amb|Lev|Mer)( \w )(?:ax|lis|ra|ium)/i
describe        HSC_VIAGRA3     Common Viagra and Medicinal Table Trick
score           HSC_VIAGRA3     3.1
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '25', 
			'type' => 'body', 
			'name' => 'HSC_VIAGRA
', 
			'value' => 'body     HSC_VIAGRA5 /(V [1li|\]] [a&] G R A|VljAG+R+A)/i
describe HSC_VIAGRA5 Viagra Obfuscation Technique SPAM
score    HSC_VIAGRA5 3.1
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '26', 
			'type' => 'body', 
			'name' => '__HSC_STOCK
', 
			'value' => 'body            __HSC_STOCK3    /([sS].?ymbol|Sym|SYM|SYMB|Symb|SYMBOL|SYmN|SYMN|Symn|Ticker|TICKER|Lookup|PINKSHEETS)\s*[-_:]\s*[A-Z0-9][-\._ ]?[A-Z0-9][-\._ ]?[A-Z0-9][-\._ ]?[A-Z0-9]/
score           __HSC_STOCK3    0.3
describe        __HSC_STOCK3    Email Looks like it references a 4 character stock symbol
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '27', 
			'type' => 'body', 
			'name' => 'HSC_PERPARK
', 
			'value' => 'body     HSC_PERPARK /P e r i m e t e r P a r k C e n t e r/i
describe HSC_PERPARK Obfuscated address appearing in SPAM Feb 06
score    HSC_PERPARK 2.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '28', 
			'type' => 'body', 
			'name' => 'HSC_HOLLY
', 
			'value' => 'body     HSC_HOLLY   /1 0 2 0 N H o l l y w o o d W a y /i
describe        HSC_HOLLY       Obfuscated address appearing in SPAM Jun 06
score           HSC_HOLLY       2.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '29', 
			'type' => 'body', 
			'name' => 'HSC_ADVERT
', 
			'value' => 'body     HSC_ADVERT3 /AllExpiringDomains.com/i
describe HSC_ADVERT3 Traffic / Expiring Domain List Spam
score    HSC_ADVERT3 4.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '30', 
			'type' => 'body', 
			'name' => 'HSC_CANSPAM
', 
			'value' => 'body     HSC_CANSPAM /(full compliance with the U.S. Federal-?Can-?Spam-Act|provides CAN-SPAM compliant email|consistent with the provisions of the CAN-SPAM Act|compliance with the CanSpam Act)/is
describe HSC_CANSPAM SPAM = Lack of Consent (not a Legal Definition)
score    HSC_CANSPAM 1.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '31', 
			'type' => 'body', 
			'name' => 'HSC_PUBLIC
', 
			'value' => 'body     HSC_PUBLIC  /obtained your email address from a publicly available list|find your mail in public forum/is
describe HSC_PUBLIC  Obtained from Public List != to Consent == SPAM!
score    HSC_PUBLIC  4.0   
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '32', 
			'type' => 'body', 
			'name' => 'HSC_BODY
', 
			'value' => 'body     HSC_BODY /{_BODY_HTML}/i
describe HSC_BODY Odd Erectile Dysfunction Messages with Poor Formatting
score    HSC_BODY 1.0   
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '33', 
			'type' => 'header', 
			'name' => 'HSC_RE
', 
			'value' => 'header      HSC_RE      Subject =~ /^Re(?:\s)*\[\d\]+(?:\s)*:?$/i
describe HSC_RE      Subject of Re[0]: etc prevalent in Spam
score    HSC_RE      2.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '34', 
			'type' => 'header', 
			'name' => 'HSC_ADV_EMAIL
', 
			'value' => 'header          HSC_ADV_EMAIL           From =~ /(^| |<)ADV\@/i
describe        HSC_ADV_EMAIL           Marks adv@<domain.com> Addresses as likely SPAM
score    HSC_ADV_EMAIL     4.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '35', 
			'type' => 'header', 
			'name' => 'HSC_IFRAME
', 
			'value' => 'header      HSC_IFRAME  X-IframeWarning =~ /Iframe\/Object\/Script tag\(s\) deactivated by MIMEDefang/
describe HSC_IFRAME  Email contained Iframe, Object or Script tags
score    HSC_IFRAME  1.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '36', 
			'type' => 'header', 
			'name' => 'HSC_SPAMJDR
', 
			'value' => 'header      HSC_SPAMJDR    X-Mailerinfo =~ /OTHR_JDR/
describe HSC_SPAMJDR    Emails seen with SPAM containing this header X-Mailerinfo: OTHR_JDR1173771
score    HSC_SPAMJDR 2.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '37', 
			'type' => 'header', 
			'name' => 'HSC_THEBAT
', 
			'value' => 'header      HSC_THEBAT  X-Mailer =~ /The Bat!/i
describe HSC_THEBAT  Abused X-Mailer Header for The Bat! MUA
score    HSC_THEBAT  1.9
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '38', 
			'type' => 'rowbody', 
			'name' => 'HSC_PHISH
', 
			'value' => 'rawbody         HSC_PHISH1      /u style="cursor: pointer"/
describe        HSC_PHISH1      Test for PHISH that changes the cursor
score           HSC_PHISH1      0.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '39', 
			'type' => 'rowbody', 
			'name' => 'HSC_ADVERT
', 
			'value' => 'rawbody     HSC_ADVERT2 /(No longer interested in our offers|This (?: message| email)?is an Ad|Continue in your Secure Web Browser|Can\'t see the images( below|, continue)|To view this email as a webpage|see images for this offer|support best practices in responsible email marketing|This email is not unsolicited|You registered with one of our partners websites|a d v e r t i s (?:e )?m e n t|No-?Images? Click|Program is not endorsed, sponsored by or affiliated|can\'t read or see this email|By clicking any image and\/or text link in this Email|This is a commercial message|This message brought to you|THIS EMAIL IS A COMMERCIAL SOLICITATION|If you no longer wish to receive further offers)/is
describe HSC_ADVERT2 This is probably an unwanted commercial email...
score    HSC_ADVERT2 0.55
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '40', 
			'type' => 'rowbody', 
			'name' => 'HSC_INFO
', 
			'value' => 'rawbody     HSC_INFO /http:\/\/.{8}\.info/i
score    HSC_INFO 1.0
describe HSC_INFO Prevalent use of .info domains in spam/malware
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '41', 
			'type' => 'rowbody', 
			'name' => 'HSC_OWAPHISH
', 
			'value' => 'rawbody     HSC_OWAPHISH1  /http:\/\/.{5,30}\/owa\/service_directory\/settings.php/i
score    HSC_OWAPHISH1  4.0
describe HSC_OWAPHISH1  Rash of OWA setting change emails for phishing
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '42', 
			'type' => 'meta', 
			'name' => '__HSC_REAL
', 
			'value' => 'body     __HSC_REAL1    /(^|\b)RE market/is
body     __HSC_REAL2 /(crashing|declining)/i
body     __HSC_REAL3 /(vacation|second) (home|place)/is
meta     HSC_REAL (__HSC_REAL1 + __HSC_REAL2 + __HSC_REAL3 >= 3)
describe HSC_REAL Real Estate or Re-Finance Spam
score    HSC_REAL 0.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '43', 
			'type' => 'meta', 
			'name' => '__HSC_REFI
', 
			'value' => 'header      __HSC_REFI1 Subject =~ /(?:I would like to offer you my help|Lower your house payment|follow up email|evaluation enclosed|submit a bid|fixed rates|ARM program|New Program|regardless of credit|loan request|accepting your application|refinance appl?ication|ready to (give a (business )?loan|lend)|good credit or not|refinance without perfect credit|financial independence|Loan Offer|Get a Loan|your urgent loan|credit report)/i
body     __HSC_REFI2 /(Free Evaluation (?:online|on your (?:current )?home loan)|No hidden costs|no strings attached|good credit or not|personalized consultation|in need of loan|consolidation loan|loan processing|apply by sending|loan of any amount|clean up any inacccuracies)/is
body     __HSC_REFI3 /(restructure (?:proposal|program|opportunity|your loan)|switch from an adjustable rate to a fixed|new lending program|(low|reasonable) interest (loan|rate)|lowest monthly payment|\d% interest|unsecured personal|better credit terms)/is
body     __HSC_REFI4 /(\$\d{1,3},\d{1,3}|\d{2,3}k of funds|\d{4,6} USD|\d{4,6}\$ per month|\d{3,5}\/mo)/i
body     __HSC_REFI5 /([\d,]{5,6}|\d{2}\s*%) savings/is
body            __HSC_REFI6     /((?:reduce your monthly payment|save you) (between )?\d{2}\s*%|save yourself hundreds of dollars|great rate available|completely unsecured|instantly connect with\s+lenders|get you back on the right financial|get report today)/is
body     __HSC_REFI7 /(?:loan product|equity cash|monthly house payment|mortgage|no up front fees|seasoned equity|pay off high rate cards|ARM Program|credit is less than perfect|credit (score )?will not disqualify|plastic money|charge card balances|we offer out loans|floating loan scheme|unsecured guaranteed)/is
header          __HSC_REFI8     From =~ /great (loan|mortgage)|financ/i

meta     HSC_REFI (__HSC_REFI1 + __HSC_REFI2 + __HSC_REFI3 + __HSC_REFI4 + (__HSC_REFI5 + __HSC_REFI6 >= 1) + __HSC_REFI7 + __HSC_REFI8 >= 4)
describe HSC_REFI Real Estate / Re-Finance Spam
score    HSC_REFI 4.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '44', 
			'type' => 'meta', 
			'name' => '__HSC_DEBT
', 
			'value' => 'body     __HSC_DEBT1 /(debts disappear|reduce your payments|piling bills|creditors|late bills|vanish some of your bills|reduce your payments|looming bills|all that debt|outstanding debt|debt.{0,7}accumulated|all my debt|penalties,? and fees are gone|banking laws|select legal|change your life|get out of .?d.?e.?b.?t|Free[- ]Credit Report|debt relief options|are you in debt|pay off all your debt|get better rates)/is
header      __HSC_DEBT2 Subject =~ /(all that you owe|all you owe|everything you owe|eradicate|indebted|sick of bills|debt.{0,7}accumulated|tired of (the )?debt|looming debt|creditors|bank[ ]?rupt|debt ?free|out ?of ?debt|take control of your monthly payments|bills disappear|We can help|consultation regarding bills|get better rates|credit score|FICO Score|eliminate\s{1,2}debt|Erase the debt|loan offer)/i
body     __HSC_DEBT3 /(bills keeping you|brink of bankruptcy|take all the (stress|pain) away|all the bills|tired of high credit card|make your bills disappear|improve your credit score|b.?a.?n.?k.?r.?u.?p.?t.?c?.?y|monitor your[- ]credit|Wipes out debt|being debt free|interest rates are reasonable|view your credit score)/is
meta     HSC_DEBT ((__HSC_DEBT1 + __HSC_DEBT2 + __HSC_DEBT3) >= 3)
describe HSC_DEBT Debt eradication spams
score    HSC_DEBT 2.5
meta            HSC_DEBT2       ((__HSC_DEBT1 + __HSC_DEBT2 + __HSC_DEBT3) >= 2)
describe        HSC_DEBT2       Likely Debt eradication spams
score           HSC_DEBT2       1.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '45', 
			'type' => 'meta', 
			'name' => '__HSC_SILD
', 
			'value' => 'header          __HSC_SILD1     Subject =~ /Sildenafil Citrate/i
body     __HSC_SILD2 /(XtraSize+|Sildenafil Citrate)/i
meta     HSC_SILD (__HSC_SILD1 + __HSC_SILD2 >= 1)
describe        HSC_SILD        Simple rule to block one more enhancement message
score           HSC_SILD        5.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '46', 
			'type' => 'meta', 
			'name' => '__HSC_VIAGRA
', 
			'value' => 'body     __HSC_VIAGRA4A /V (. )?A (. )?L (. )?[I\/t] (. )?U (. )?M/i
body     __HSC_VIAGRA4B /V (. )?[I\/t] (. )?A (. )?G (. )?R (. )?A/i
body     __HSC_VIAGRA4C /M (. )?E (. )?R (. )?[I\/t] (. )?D (. )?[I\/] (. )?A/i
meta     HSC_VIAGRA4 ((__HSC_VIAGRA4A + __HSC_VIAGRA4B + __HSC_VIAGRA4C) >= 2)
describe HSC_VIAGRA4 Common Viagra and Medicinal Table Trick
score    HSC_VIAGRA4 3.1
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '47', 
			'type' => 'meta', 
			'name' => '__HSC_VIAGRA
', 
			'value' => 'body     __HSC_VIAGRA6A /V.?[IL1].?A.?G.?R.?A/i
body     __HSC_VIAGRA6B /A.?M.?B.?[il1].?E.?N/i
body     __HSC_VIAGRA6C /V.?A.?L.?[il1].?U.?M/i
body     __HSC_VIAGRA6D  /C.?[il1].?A.?L.?[Il1].?S($|\b)/i
header      __HSC_VIAGRA6E From =~ /Viagra|Cialis/i
meta     HSC_VIAGRA6 (__HSC_VIAGRA6A + __HSC_VIAGRA6B + __HSC_VIAGRA6C + __HSC_VIAGRA6D + __HSC_VIAGRA6E >= 2)
describe HSC_VIAGRA6 Viagra Obfuscation Technique SPAM
score    HSC_VIAGRA6 3.1
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '48', 
			'type' => 'meta', 
			'name' => '__HSC_VIAGRA
', 
			'value' => 'body            __HSC_VIAGRA7A  /V[ij]+AGRA/i
body            __HSC_VIAGRA7B  /C[ij]+AL[ij]+S($|\b)/i
body            __HSC_VIAGRA7C  /AMB[ij]+EN/i
body            __HSC_VIAGRA7D  /VAL[ij]+UM/i
meta            HSC_VIAGRA7     ((__HSC_VIAGRA7A + __HSC_VIAGRA7B + __HSC_VIAGRA7C + __HSC_VIAGRA7D >= 2) && (HSC_VIAGRA6 < 1))
describe        HSC_VIAGRA7     Viagra Obfuscation Technique SPAM
score           HSC_VIAGRA7     3.1
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '49', 
			'type' => 'meta', 
			'name' => '__HSC_VIAGRA
', 
			'value' => 'body            __HSC_VIAGRA8A  /VI...?AGRA/i
body            __HSC_VIAGRA8B  /AM...?BIEN/i
body            __HSC_VIAGRA8C  /VA...?LIUM/i
body            __HSC_VIAGRA8D  /CI...?ALIS/i
meta            HSC_VIAGRA8     ((__HSC_VIAGRA8A + __HSC_VIAGRA8B + __HSC_VIAGRA8C + __HSC_VIAGRA8D) >= 2)
describe        HSC_VIAGRA8     Viagra Obfuscation Technique SPAM
score           HSC_VIAGRA8     5.1
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '50', 
			'type' => 'meta', 
			'name' => '__HSC_VIAGRA
', 
			'value' => 'body            __HSC_VIAGRA9A  /V[IL1]A..GRA/i
body            __HSC_VIAGRA9B  /AMB..IEN/i
body            __HSC_VIAGRA9C  /VAL..IUM/i
body            __HSC_VIAGRA9D  /C[IL1]A..LIS/i
meta            HSC_VIAGRA9     ((__HSC_VIAGRA9A + __HSC_VIAGRA9B + __HSC_VIAGRA9C + __HSC_VIAGRA9D) >= 2)
describe        HSC_VIAGRA9     Viagra Obfuscation Technique SPAM
score           HSC_VIAGRA9     5.1
meta     HSC_RE_PLUS (HTML_IMAGE_ONLY_08+HSC_RE >= 2)
describe HSC_RE_PLUS Bad Subject and Image Only rule hit == SPAM!
score    HSC_RE_PLUS 4.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '51', 
			'type' => 'meta', 
			'name' => '__HSC_HOODIA
', 
			'value' => 'header      __HSC_HOODIA1  Subject =~ /(hoodia|920+)/i
body     __HSC_HOODIA2  /(?:hoodia|920+)/i
body     __HSC_HOODIA3  /(?:fat loss product|sur?p?press appetite)/is
meta     HSC_HOODIA  (__HSC_HOODIA1 + __HSC_HOODIA2 + __HSC_HOODIA3 >= 3)
describe HSC_HOODIA  Hoodia Product Promotion Spam
score    HSC_HOODIA  6.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '52', 
			'type' => 'meta', 
			'name' => '__HSC_STOCKTIP
', 
			'value' => '#STOCK TIPS
body            __HSC_STOCKTIP1 /(?:Reynaldo's Mexican Food|RYNL)/is
body            __HSC_STOCKTIP2 /(?:KOKO PETROLEUM|KKPT)/is
body		__HSC_STOCKTIP3 /(?:DARK DYNAMITE|DKDY|D K D Y)/is
body            __HSC_STOCKTIP4 /(?:Remington Ventures|RMVN)/is
body		__HSC_STOCKTIP5 /(?:m-Wise|MWIS|M W I S)/is
body		__HSC_STOCKTIP6 /(?:China World Trade Corporation|CWTD)/is
body		__HSC_STOCKTIP7 /(?:Packets International|IPKL)/is
body		__HSC_STOCKTIP8 /(?:Infinex Ventures|IFNX)/is
body		__HSC_STOCKTIP9 /(?:FacePrint Global Solutions|FCPG)/is
#THANKS TO HOMER PARKER FOR THE FALSE POSSITIVE NOTE!
body            __HSC_STOCKTIP10 /(?:Ever[-_ ~]{0,3}Gl[o0]ry|(^|\b)E[-_~\. =]{0,3}G[-_~\. =]{0,3}L[-_~\. =]{0,3}Y($|\b))/is
body		__HSC_STOCKTIP11 /(?:Gulf Petroleum|GFPE)/is
body		__HSC_STOCKTIP12 /(?:Patriot Mechanical Handling|PMHH)/is
body		__HSC_STOCKTIP13 /(?:KSW Industries|KSWJ)/is
body		__HSC_STOCKTIP14 /(?:Conforce International|CFRI)/is
body		__HSC_STOCKTIP15 /(?:Nano Superlattice Technology|NSLT)/is
body		__HSC_STOCKTIP16 /(?:Morgan Beaumont|MBEU)/is
body		__HSC_STOCKTIP17 /(?:Relay Capital|(^|\b)RLYC($|\b))/is
#THANKS TO DAVID GOLDSMITH FOR POINTING OUT THE POTENTIAL FPs FROM THIS RULE
body		__HSC_STOCKTIP18 /(?:Madison Explorations|(?:^|\b)MDEX(?:$|\b))/is
body		__HSC_STOCKTIP19 /(?:CTR Investments and Consulting|C ?I ?V ?X)/is
body		__HSC_STOCKTIP20 /(?:PREMIER INFORMATION|(?:^|\b)PIFR(?:$|\b))/is
body		__HSC_STOCKTIP21 /(?:Harbin Pingchuan|P G C N|PGCN)/is
body		__HSC_STOCKTIP22 /(?:CLIENT TRACK CORP|CTKR)/is
body		__HSC_STOCKTIP23 /(?:EXTREME INNOVATIONS|(^|\b)EXTI($|\b))/is
body		__HSC_STOCKTIP24 /(?:Medical Home Products|MHPT)/is
body		__HSC_STOCKTIP25 /(?:AmeraMex International|AMMX)/is
body		__HSC_STOCKTIP26 /(?:Equipment & Systems Engineering|EQUIPMENT & SYS ENGR|EQSE)/is
body		__HSC_STOCKTIP27 /(?:NANOFORCE|NNFC)/i
body		__HSC_STOCKTIP28 /(?:\b|^)(?:Resort Clubs (I|\|)nternational|R[ ]*T[ ]*C[ ]*(?:I|\|))(?:\b|$)/is
body		__HSC_STOCKTIP29 /(?:Innovation Holdings|IVHN)/is
body		__HSC_STOCKTIP30 /(?:GOLDEN APPLE OIL|GAPJ)/is
body		__HSC_STOCKTIP31 /(?:inZon Corporation|(^|\b)I ?Z ?O ?N($|\b))/is
body		__HSC_STOCKTIP32 /(?:Midland Baring Financial Group|MDBF)/is
body            __HSC_STOCKTIP33 /(?:Aradyme Corporation|A D Y E)/is
body		__HSC_STOCKTIP34 /(?:TRANSAKT CORP|TKTJF)/is
body		__HSC_STOCKTIP35 /(?:CTXE|CANTEX ENERGY CORP)/is
body		__HSC_STOCKTIP36 /(?:De Greko|DGKO)/is
body		__HSC_STOCKTIP37 /(?:Deep Earth Resource, Inc|CTFE|DPER)/is
body		__HSC_STOCKTIP38 /(?:Vemics|VMCI|Summit Financial Resources)/is
body		__HSC_STOCKTIP39 /Premium Petroleum/is
body		__HSC_STOCKTIP40 /(?:F ?a ?l ?c ?o ?n  ?E ?n ?e ?r ?g ?y|F.?C.?Y.?I)/s
body		__HSC_STOCKTIP41 /(?:CHINA GOLD CORP|CGDC)/is
body		__HSC_STOCKTIP42 /DPEK/i
#FIXED FP THANKS TO BEN LENTZ - Also found that the X ?X ?X ?X concept is causing too many FPs thanks to Homer Parker
body		__HSC_STOCKTIP43 /(?:Amerossi International Group|A M S N(\b|$)|AMSN)/is 
body		__HSC_STOCKTIP44 /(?:WATAIRE INDUSTRIES|W ?T ?A ?F)/is
body		__HSC_STOCKTIP45 /(?:ABSOLUTESKY|A ?B ?S ?Y)/i
body		__HSC_STOCKTIP46 /(?:Infinex Ventures|I ?N ? ?F ?X)/is
body		__HSC_STOCKTIP47 /(?:Holly ?wood Intermediate|HYWI|H Y W I)/is
#DISABLED DUPLICATE OF 40
#body		__HSC_STOCKTIP48 /(?:Falcon Energy|F ?C ?Y ?I)/is
body		__HSC_STOCKTIP49 /(?:\b|^)(?:AGA Resources|A ?G ?A)(?:\b|$)/is
body		__HSC_STOCKTIP50 /(?:COSCO|CCPI)/i
body		__HSC_STOCKTIP51 /(?:PETRO([- ?])?SUN DRILLING|P[- ]?S[- ]?U[- ]?D)/is
body		__HSC_STOCKTIP52 /(?:KMA Global Solutions International|KMAG)/is
body		__HSC_STOCKTIP53 /(?:Advanced Powerline Technologies|APWL)/is
body		__HSC_STOCKTIP54 /(?:GOLDMARK INDUSTRIES|GDKI)/is
body		__HSC_STOCKTIP55 /(?:QUANTUM ENERGY|QEGY)/is
#FP FIXED THANKS TO Homer Parker
body		__HSC_STOCKTIP56 /(?:AAGA RESOURCE+S NEW|A G A O|(\b|^)AGAO(\b|$))/is
#FP FIXED THANKS TO Homer Parker
body		__HSC_STOCKTIP57 /(?:Bicoastal Communications|BCLC|B C L C)/is
body            __HSC_STOCKTIP58 /(?:Greater China Media \& Ent|G ?C ?M ?E)/is
body		__HSC_STOCKTIP59 /(?:Viva International|VIVI)/s
body		__HSC_STOCKTIP60 /(?:WILON RESOURCES|WLON)/is
body		__HSC_STOCKTIP61 /(?:Am+erica+n U+ni+ty I+nve+stments|(\b|^)A[ _]?U[ _]?N[ _]?I[ _]?(\b|$))/is
body		__HSC_STOCKTIP62 /(?:DEFENSE DIRECTIVE|DFSE)/is
body		__HSC_STOCKTIP63 /(?:Cyberhand Technologies|CYHD)/is
body		__HSC_STOCKTIP64 /(?:Texhoma Energy|TXHE)/is
body		__HSC_STOCKTIP65 /(?:Equal Trading|EQTD)/is
#DISABLED FOR FALSE POSITIVES AND AGE
#body		__HSC_STOCKTIP66 /(?:\b|^)W.?B.?R.?S(?:\b|$)/is
body		__HSC_STOCKTIP67 /(?:Mobile Airwaves|M.?W.?B.?C.?(\b|$))/is
body		__HSC_STOCKTIP68 /(?:X-tra Petroleum|XTPT)/is
body		__HSC_STOCKTIP69 /(?:Red Reef Laboratories|RREF)/is
body		__HSC_STOCKTIP70 /(?:Great American Food Chain|GAMN)/is
body		__HSC_STOCKTIP71 /(?:Cana Petroleum|CNPM)/is
body		__HSC_STOCKTIP72 /(?:China Health Management|CNHC)/is
body		__HSC_STOCKTIP73 /(?:Makeup Limited|MAKU)/is
body		__HSC_STOCKTIP74 /(?:Premier Holdings Group|PMHD)/is
body		__HSC_STOCKTIP75 /(?:VSUS technologies|VSUS)/is
body		__HSC_STOCKTIP76 /(?:FLAIR PETROLEUM|FPMC)/is
body		__HSC_STOCKTIP77 /(?:Physician Adult Daycare|PHYA)/is
#FP FIXED THANKS TO Homer Parker
body		__HSC_STOCKTIP78 /(?:AlgoDyne Ethanol Energy|(\b|^)ADYN(\b|$))/is
body		__HSC_STOCKTIP79 /(?:Critical Care.{1,3}Inc|CTCX)/is
body		__HSC_STOCKTIP80 /(?:Aerofoam Metals|AFML)/is
body		__HSC_STOCKTIP81 /(?:Ten \& 10|(?:\b|^)TTEN)/is
body		__HSC_STOCKTIP82 /(?:Medical Institutional Services|MISJ(\b|$))/is
body		__HSC_STOCKTIP83 /(?:Harris Exploration|HXPN)/is
body		__HSC_STOCKTIP84 /(?:MARSHAL HOLDINGS|MHII)/is
body		__HSC_STOCKTIP85 /(?:ADVANCED GROWING SYSTEMS|AGWS)/is
body		__HSC_STOCKTIP86 /(?:WEST EXCELSIOR ENT|WEXE)/is
body		__HSC_STOCKTIP87 /(?:Hemisphere Gold|HPGI)/is
body		__HSC_STOCKTIP88 /(?:Victory Energy Corporation|VYEY)/is
body		__HSC_STOCKTIP89 /UTEV/i
body		__HSC_STOCKTIP90 /(?:CHINA BIOLIFE ENTERP|CBFE)/is
body		__HSC_STOCKTIP91 /(?:Critical Care|C ?T ?C ?X)/is
body		__HSC_STOCKTIP92 /CBRJ/i
body		__HSC_STOCKTIP93 /(?:LAS VEGAS CENTRAL RESERVATIONS|LVCC)/is
body		__HSC_STOCKTIP94 /GTAP/i
body		__HSC_STOCKTIP95 /(North American Energy Group|N-?N-?Y-?R)/is
body		__HSC_STOCKTIP96 /C\.?C\.?T\.?I/i
body		__HSC_STOCKTIP97 /(C ?E ?O AMERICA|C ? E ? O ?A)/is
body            __HSC_STOCKTIP98 /PLMA/i
body		__HSC_STOCKTIP99 /CDYV/i
body		__HSC_STOCKTIP100 /(Fire (Mountain|Mtn) Beverage Company|(^|\b)F[ _]?B[ _]?V[ _]?G($|\b))/is
body		__HSC_STOCKTIP101 /WDSC/i
body		__HSC_STOCKTIP102 /(Distributed Power|DPWI)/is
body		__HSC_STOCKTIP103 /(HUMET-PBC|L9Z\.F)/is
body		__HSC_STOCKTIP104 /ASVP/is
body		__HSC_STOCKTIP105 /CHVC/is
body		__HSC_STOCKTIP106 /(China Datacom|CDPN)/is
body		__HSC_STOCKTIP107 /(ORAMED PHARMA|OJU\.F)/is
body		__HSC_STOCKTIP108 /(DSDI|DSI Direct Sales)/is
body		__HSC_STOCKTIP109 /(Monolith Athletic Club|M[-_ ]?N[-_ ]?A[-_ ]?B)/is
#DUPLICATED STOCKTIP #51
#body		__HSC_STOCKTIP110 /(PETRO-SUN|P[- ]?S[- ]?U[- ]?D)/is
body		__HSC_STOCKTIP111 /(COMPLIANCE SYSTEMS|(\b|^)COPI(\b|$))/is
body		__HSC_STOCKTIP112 /(Global Pay Solutions|GPSI)/is
body		__HSC_STOCKTIP113 /(MEGOLA|MGOA)/i
body		__HSC_STOCKTIP114 /ADOV/i
body            __HSC_STOCKTIP115 /(Oncology Med|(\b|^)ONCO(\b|$))/is
body		__HSC_STOCKTIP116 /(Strategy X|SGXI)/is
body		__HSC_STOCKTIP117 /(Spotlight Homes|COST CONTAINMENT TEC|SPHM)/is
#FALSE POSITIVE ON DANSREALESTATE.
body		__HSC_STOCKTIP118 /((\b|^)SREA(\b|$)|Score One)/is
body		__HSC_STOCKTIP119 /(Monster Motors|MRMT)/is
body		__HSC_STOCKTIP120 /(EntreMetrix|ERMX)/i
body		__HSC_STOCKTIP121 /(VISION AIRSHIPS|VPSN)/is
body		__HSC_STOCKTIP122 /(Shandong Zhouyuan Seed and Nursery|SZSN)/is
body		__HSC_STOCKTIP123 /(Puerto Rico 7|P ?R ?T ?H)/is
body		__HSC_STOCKTIP124 /(VGPM|Vega Promotional Sys)/is
body		__HSC_STOCKTIP125 /(D[- ]?M[- ]?X[- ]?C)/i
body		__HSC_STOCKTIP126 /(C\.?W\.?T\.?E|C'Watre International)/is
body		__HSC_STOCKTIP127 /(Physical Property Holdings|(\b|^)PPYH(\b|$))/is
body		__HSC_STOCKTIP128 /(MONUMENTAL MARKETING|MNUM)/is
body		__HSC_STOCKTIP129 /(EnerBrite Technologies Group|eTgU)/is
body		__HSC_STOCKTIP130 /(Pricester|PRCC)/is
body		__HSC_STOCKTIP131 /(Greenstone Holdings|GSHN)/is
body		__HSC_STOCKTIP132 /(AGMS|Angstrom[- ]Microsystems)/is
body		__HSC_STOCKTIP133 /(Pluris Energy|PEYG)/is
body		__HSC_STOCKTIP134 /(United Consortium|(\b|^)UCSO(\b|$))/is
body		__HSC_STOCKTIP135 /(Dominion Minerals|DMNM)/is
body		__HSC_STOCKTIP136 /(PrimeGen Energy|PGNE)/is
body		__HSC_STOCKTIP137 /Dynamic Response Group|DRGZ/is
body		__HSC_STOCKTIP138 /Cobra Oil (and|&) Gas|CGCA/is
body		__HSC_STOCKTIP139 /Solanex Management|SLNX/is
body		__HSC_STOCKTIP140 /BIO-SOLUTIONS|BISU/is
body		__HSC_STOCKTIP141 /(\b|^)FORC(\b|$)/is
body		__HSC_STOCKTIP142 /Hawk Systems Inc|HWSYD/is
body            __HSC_STOCKTIP143 /AmeriLithium|(\b|^)AMEL(\B|$)/is
body            __HSC_STOCKOTC  /(OTC|OTC ?BB|OTC Pink Sheets|NASDAQ|StockWatch):/is
body            __HSC_STOCKSYM  /S[ ]?[iy][ ]?m[ ]?[�?b8][ ]?[o0][ ]?[l1]|Siymbol/i
body            __HSC_STOCKSYM2 /(SYM[ ]?[-\:]|\bTicker|Pr+ice\s*\:|Volume\s*\:|Target\s*\:|Current(ly)? ?\??:|Projected:|Smybol:|Stcok\s*\:|Stock\s*\:|S\s*t\s*o\s*c\s*k\s*\:|Trad[ ]?e\:|short-?sell|book value|S\.umbol|Action:|Symb\s?[-:]|Price Today:|SYmN-|Lookup:|RADAR:|PK PAPER:|PINKSHEETS:|f[o0]rward ?l[0o]{2}king)/i
body		__HSC_STOCKSHR	/\b(Shares|Investments|invest|Stock|acquisitions?|broker|joint[ -]?venture|underperforming|(uncap|ventilated|public(ity)?) on friday|dividend opportunities|set your buy|financial safe haven|before the bell)\b/i
body		__HSC_STOCKBULL /bull (run|market)/is
body		__HSC_STOCKSCTR /(energy sector|mineral rights|mineral wealth|natural resources|gold deposits)/is
header		__HSC_STOCKHEAD Subject =~ /{stk-sub}|on your radar|st0ck/i
body		__HSC_STOCKJUMP /(up|jumps) \d\d(\.\d)?\%/i

meta            HSC_STOCKTIP    ((__HSC_STOCKHEAD + __HSC_STOCKOTC + __HSC_STOCKSYM + __HSC_STOCKJUMP + __HSC_STOCKSHR + __HSC_STOCKSYM2 + __HSC_STOCKBULL + __HSC_STOCKSCTR) >= 1) && (', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '53', 
			'type' => 'meta', 
			'name' => '__HSC_STOCK
', 
			'value' => 'body     __HSC_STOCK2_1  /(good trader|trading experience|bad trading day|hard trading day|FREE Stock Market Outlook|Market Watch)/i
body     __HSC_STOCK2_2  /(easy cash|losses and victories|backstage trading|market facts|succeed in trading|destined to skyrocket)/i
body     __HSC_STOCK2_3  /stock/i
body     __HSC_STOCK2_4  /trader/i
header      __HSC_STOCK2_5 Subject =~ /stock|bull market|penny/i
meta     HSC_STOCK2  (__HSC_STOCK2_1 +  __HSC_STOCK2_2 +  __HSC_STOCK2_3 +  __HSC_STOCK2_4 +  __HSC_STOCK2_5) >= 4
score    HSC_STOCK2  2.5
describe HSC_STOCK2  Another Round of Pump & Dump Stock Scans
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '54', 
			'type' => 'body', 
			'name' => 'HSC_BR_LACADOR_
', 
			'value' => 'body HSC_BR_LACADOR_02     /Rua Jo�o Guimar�es, 31/i
score HSC_BR_LACADOR_02     6.0', 
			'created_at' => '2012-02-29 10:46:41', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '55', 
			'type' => 'body', 
			'name' => 'HSC_BR_LACADOR_
', 
			'value' => 'body HSC_BR_LACADOR_03     /lacadordeofertas/i
score HSC_BR_LACADOR_03     6.0', 
			'created_at' => '2012-02-29 10:47:23', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '56', 
			'type' => 'uri', 
			'name' => 'HSC_RULE_URI_
', 
			'value' => 'uri HSC_RULE_URI_0135   /sejabelcorp\.net/i
score HSC_RULE_URI_0135 6.0', 
			'created_at' => '2012-02-29 10:56:59', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '57', 
			'type' => 'body', 
			'name' => 'HSC_BR_OLHADELA_
', 
			'value' => 'body HSC_BR_OLHADELA_01     /N�o deixe a galera sem dar uma olhadela/i
score HSC_BR_OLHADELA_01     6.0', 
			'created_at' => '2012-02-29 10:51:20', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '58', 
			'type' => 'body', 
			'name' => 'HSC_BR_OLHADELA_
', 
			'value' => 'body HSC_BR_OLHADELA_02     /Envie para todos os seus amigos/i
score HSC_BR_OLHADELA_02     1.0', 
			'created_at' => '2012-02-29 10:51:46', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '59', 
			'type' => 'body', 
			'name' => 'HSC_BR_OLHADELA_
', 
			'value' => 'body HSC_BR_OLHADELA_03     /N�o desejo receber e-mails do Saiba Primeiro/i
score HSC_BR_OLHADELA_03     3.0', 
			'created_at' => '2012-02-29 10:52:18', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '60', 
			'type' => 'meta', 
			'name' => '__HSC_BACK
', 
			'value' => 'body     __HSC_BACK1 /NATIONAL/
body     __HSC_BACK2 /(Property & Personal history|Asset & Background) (Investigation|Search)/is
body     __HSC_BACK3 /(background check|detective|investigator)/is
header      __HSC_BACK4 Subject =~ /(background check|date-smart|detective|finding people)/i
describe HSC_BACK Background Check SPAM
meta     HSC_BACK (__HSC_BACK1 + __HSC_BACK2 + __HSC_BACK3 + __HSC_BACK4 >=2)
score    HSC_BACK 1.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '61', 
			'type' => 'meta', 
			'name' => '__HSC_MED
', 
			'value' => 'body     __HSC_MED1  /e.?c.?o.?n.?o.?m.?i.?z.?e.{1,10}med/i
body     __HSC_MED2  /\d\d ?%/
describe HSC_MED     Economizing your meds spam
meta     HSC_MED     (__HSC_MED1 + __HSC_MED2 >= 2)
score    HSC_MED     1.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '62', 
			'type' => 'meta', 
			'name' => '__HSC_MED
', 
			'value' => 'header      __HSC_MED2_1   Subject =~ /Pharmacy order \#\d{5}/i
describe HSC_MED2 More Medical SPAM
meta     HSC_MED2 (__HSC_MED2_1 >= 1)
score    HSC_MED2 1.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '63', 
			'type' => 'meta', 
			'name' => '__HSC_TIME
', 
			'value' => 'header      __HSC_TIME1 Subject =~ /(replica|diamond|designer[-_ ](watch|piece|collection)|(old|replica|style|luxury|trendy|elegant) watch|time[-_ ](keeper|piece)|wrist|chronometer|watches are in fashion|low budget|deliver your watch|(number|amount) of watches)/i
body     __HSC_TIME2 /(replica|diamond|designer[-_ ](piece|collections|watch)|time[-_ ]piece|wrist|time-keeper|\/\/atch)/is
header      __HSC_TIME3 Subject =~ /time|watch/i
body     __HSC_TIME4 /time|watch/i
body     __HSC_TIME5 /(funny|low) price/i
body     __HSC_TIME6 /(Cx?ARTIER|Bx?REITLING|Px?ATEK|Rx?OLEX|Bx?VLGARI|Tx?IFFANY)/i
meta     HSC_TIME ((__HSC_TIME1 + ((__HSC_TIME2 + __HSC_TIME3 + __HSC_TIME4 + __HSC_TIME5 + __HSC_TIME6)/2)) >= 2)
describe HSC_TIME Pssss.  Hey Buddy, wanna buy a watch?
score    HSC_TIME 3.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '64', 
			'type' => 'meta', 
			'name' => '__HSC_HOME
', 
			'value' => 'body     __HSC_HOME1 /YOUR HOME/i
body     __HSC_HOME2 /Build your equity faster/i
body     __HSC_HOME3 /tax saving plans/i
meta     HSC_HOME ((__HSC_HOME1 + __HSC_HOME2 + __HSC_HOME3) >= 2)
describe HSC_HOME Mortage & Refinance Spam Rule
score    HSC_HOME 3.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '65', 
			'type' => 'meta', 
			'name' => '__HSC_UNIV
', 
			'value' => 'body     __HSC_UNIV1 /(University Administration|University Enrollment|Education Assessment|Faculty Assessment|University Degree|Administration Office|Education office|Schools office|Enrollment Office|Online University)/is
body     __HSC_UNIV2 /\d (week|month).{0,30}degree/is
body     __HSC_UNIV3 /(past work|professional|based on your|earned from|life|life and work|present work) experience/is
body     __HSC_UNIV4 /not official degree|non[ -]?accredited/is
body     __HSC_UNIV5 /novelty (degree|use)/is
body     __HSC_UNIV6 /verifiable University Degree/is
body     __HSC_UNIV7 /(life|work) experience (diploma|degree|transcript)/is
body     __HSC_UNIV8 /Career Path/is
body     __HSC_UNIV9 /non[- ]?ac(creditee?d)?.{1,10}universit/is 
body     __HSC_UNIV10    /(graduating|diploma) (within|in) (as little as)? (one|two|three|\d) (week|month)/is
body     __HSC_UNIV11   /(degree|transcript) in any field|Field of yourr? ch[oò][iì]ce/is
body     __HSC_UNIV12   /(obtain your diploma|diploma that you want|Criminal Justice or Homeland Security degree)/is
body     __HSC_UNIV13   /(degree|field|diploma) of your (choice|expertise)/is
body     __HSC_UNIV14   /(earn a|full) transcript/is
body     __HSC_UNIV15   /(No Study Required|Without Exams|No (examinations|[e�?]xams)|without attending a single class|no classes|no textbooks|no (?:required )?tests|degree .{0,30}you deserve)/is
body     __HSC_UNIV16   /\d weeks.{0,30}graduated/is
header      __HSC_UNIV17   Subject =~ /(dip(i|l)oma|degree|transcript|award|increase ?your ?income|degree online|Ph\.?D|Add an mba)/i
body     __HSC_UNIV18   /100% discrete/is
body            __HSC_UNIV1B    /\d (months|weeks)/i
body            __HSC_UNIV2B    /d[_\. ]?e[_\. ]?g[_\. ]?r[_\. ]?e[_\. ]?e/i
body     __HSC_UNIV3B   /(dead end job|improve your future, and your income|high paying jobs|bec[óo]me a do[cç]tor|get your diploma today)/is
body     __HSC_UNIV4B   /1.?0.?0.?% (legit|verifiable|online|no pre|non[- ]?accredited)/is
body     __HSC_UNIV5B   /F A S T[ ]{0,4}T R A C K/is
body     __HSC_UNIV6B   /DIP\sLOMA/
meta     HSC_UNIV ((__HSC_UNIV1 + __HSC_UNIV2 + __HSC_UNIV3 + __HSC_UNIV4 + __HSC_UNIV5 + __HSC_UNIV6 + __HSC_UNIV7 + __HSC_UNIV8 + __HSC_UNIV9 + __HSC_UNIV10 + __HSC_UNIV11 + __HSC_UNIV12 + __HSC_UNIV13 + __HSC_UNIV14 + __HSC_UNIV15 + __HSC_UNIV16 + __HSC_UNIV17 + __HSC_UNIV18) >= 2 || (__HSC_UNIV1B + __HSC_UNIV2B + __HSC_UNIV3B + __HSC_UNIV4B + __HSC_UNIV5B + __HSC_UNIV6B) >= 3)
describe HSC_UNIV Diploma Mill Rule
score    HSC_UNIV 4.5

', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '66', 
			'type' => 'meta', 
			'name' => '__HSC_URUNIT
', 
			'value' => 'body     __HSC_URUNIT1  /\bur (unit|liveliness|energy level|endurance level)/is
body     __HSC_URUNIT2  /\bur (gf|girl|wife|size|thing|partner|significant other)/is
body     __HSC_URUNIT3A  /\b(exasperated|fatigued|drained|tired) all the time/is
body     __HSC_URUNIT3   /(unsatisfied|not satisfied|nagging|complaining|complaints|complained|unlimited prowess|increase your volume)/is
body     __HSC_URUNIT4  /(bedroom|the bed|nighttime activit|male power|show your girl)/is
body     __HSC_URUNIT5   /(size of (there|their|your) .{0,11}(unit|thing)|using them for a couple months|enhancing formula)/is
body     __HSC_URUNIT6  /(majority of women|shrinking .{0,12} baby fat|winning guy|huge explosion)/is
header      __HSC_URUNIT7  Subject =~ /(\b|^)ur (unit|wife|girlfriend|GF|size|thing|partner|significant other|livelyehood)/i
header      __HSC_URUNIT8  Subject =~ /(pleasure|sensation|grow|your teeny|impress your mate|being small|how big|more intense)/i
meta     HSC_URUNIT  ((__HSC_URUNIT1 + __HSC_URUNIT2 + ((__HSC_URUNIT3 + __HSC_URUNIT4 + __HSC_URUNIT5 + __HSC_URUNIT6) / 2) + __HSC_URUNIT7 + __HSC_URUNIT8 + __HSC_URUNIT3A) >= 2)
describe HSC_URUNIT  Recent penile and body enhancement spams
score    HSC_URUNIT  0.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '67', 
			'type' => 'meta', 
			'name' => '__HSC_URZEST
', 
			'value' => 'body     __HSC_URZEST1  /(?:your|ur) (?:power|strength|zal|zeal|liveliness|zest|intensity|spontaneity|activity)(?: level)?(?: been)?(?: feeling| down)? ?(?:lately|recently|anew)?/i
body     __HSC_URZEST2  /or still (?:jaded|worn|drained|exasperated) all the time/i
body     __HSC_URZEST3   /(?:(?:wanting|looking|seeking) to get in the gym|(?:dreaming|seeking|hoping) to get (?:into shape|fit))/i
body     __HSC_URZEST4  /(wks it has been|been mos) since we('| ha)ve chatted/i
body     __HSC_URZEST5   /(back into shape|made me healthier after my disease)/i
meta     HSC_URZEST  (__HSC_URZEST1 + __HSC_URZEST2 + __HSC_URZEST3 + __HSC_URZEST4 + __HSC_URZEST5 >= 2)
describe HSC_URZEST  Recent penile and body enhancement spams
score    HSC_URZEST  3.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '68', 
			'type' => 'meta', 
			'name' => '__HSC_JOB
', 
			'value' => 'body     __HSC_JOB1  /let go from (a job|my employment) I held for.{1,19} (month|year|forever|life)/is
body     __HSC_JOB2  /twice as much/is
meta     HSC_JOB     (__HSC_JOB1 + __HSC_JOB2 >=2)
describe HSC_JOB     People let go, work at home, earn billions!
score    HSC_JOB     4.3
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '69', 
			'type' => 'meta', 
			'name' => '__HSC_STOCKG
', 
			'value' => 'header      __HSC_STOCKG1  Subject =~ /^Fw: \d{6}$/i
header      __HSC_STOCKG2  Subject =~ /(^|\b)(stocks?|small-cap)(\b|$)/i
meta     HSC_STOCKG  ((HTML_IMAGE_ONLY_12 || HTML_IMAGE_ONLY_16 || HTML_IMAGE_ONLY_24) && HTML_MESSAGE && (__HSC_STOCKG1 || __HSC_STOCKG2))
score    HSC_STOCKG  3.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '70', 
			'type' => 'meta', 
			'name' => '__HSC_CEP
', 
			'value' => 'body     __HSC_CEP1  /Job Prospect Newsletter/i
body     __HSC_CEP2  /legitimate verifiable degree/i
body     __HSC_CEP3  /Career Education program/i
body     __HSC_CEP4  /(MBA|CEP)/
body     __HSC_CEP5  /degree\/certificates/i
body            __HSC_CEP6       /\d (week|month)/i
meta            HSC_CEP        ((__HSC_CEP1 + __HSC_CEP2 + __HSC_CEP3 + __HSC_CEP4 + __HSC_CEP5 + __HSC_CEP6) >= 3)
describe        HSC_CEP        CEP Diploma Mill Rule
score           HSC_CEP        3.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '71', 
			'type' => 'meta', 
			'name' => 'HSC_BLANK
', 
			'value' => 'if (version < 3.200000)
  meta      HSC_BLANK01    (MISSING_SUBJECT && (UNDISC_RECIPS || FM_NO_FROM_OR_TO || FM_NO_TO))
  describe  HSC_BLANK01 Blank emails
  score     HSC_BLANK01     1.0
  meta      HSC_BLANK02     (HSC_BLANK01 && MSGID_FROM_MTA_ID)
  describe  HSC_BLANK02 Blank emails with MTA Headers
  score     HSC_BLANK02     1.0
endif

', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '72', 
			'type' => 'meta', 
			'name' => '__HSC_AOL
', 
			'value' => 'header          __HSC_AOL              From =~ /\@aol.com/i
describe        __HSC_AOL              Partial Rule: Marks AOL Addresses
header      __HSC_GOODAOL     From =~ /[a-z][a-z0-9]{2,15}\@aol.com/i
describe __HSC_GOODAOL     Partial Rule: Marks Bad AOL Addresses
meta            HSC_COMBO_BADAOL       __HSC_AOL && !(__HSC_GOODAOL)
describe        HSC_COMBO_BADAOL       Invalid AOL Email Address-High probability of spam
score           HSC_COMBO_BADAOL       3.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '73', 
			'type' => 'meta', 
			'name' => '__HSC_SEX_EXPLICIT
', 
			'value' => 'header    __HSC_SEX_EXPLICIT1    Subject =~ /SEXUAL{2,3}Y[-_, ]{0,1}EXPL{1,2}I{1,2}CI{1,2}T/i
header    __HSC_SEX_EXPLICIT2    Subject =~ /(fuck .*suck|suck .*fuck|pussy .*cock|cock .*pussy|horny amateur|couch sex|slut fuck|naked celebrity|pissing babes|ass[- ]fuck|animal cock)/i
header     __HSC_SEX_EXPLICIT3    From =~ /better sex/i
body    __HSC_SEX_EXPLICIT4    /fucked hardcore|dildoes her tight ass|kinky watersports|schoolgirls? slut|teens? porn|first anal(\b|$)/i
meta    HSC_SEX_EXPLICIT   (__HSC_SEX_EXPLICIT1 + __HSC_SEX_EXPLICIT2 + __HSC_SEX_EXPLICIT3 + __HSC_SEX_EXPLICIT4 >= 1)
describe  HSC_SEX_EXPLICIT      Subject or body indicates Sexually Explicit material
score     HSC_SEX_EXPLICIT      4.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '74', 
			'type' => 'meta', 
			'name' => '__HSC_TELEWORK
', 
			'value' => 'body     __HSC_TELEWORK1   /(generate|make) .{0,10}1.5K? (to|-) 3.5K (a day|daily|per day|per month)/is
body     __HSC_TELEWORK2 /have a (?:tele)?phone|money making challenge|has full internet/is
body     __HSC_TELEWORK3 /return(?:ing)? (phone )?calls/is
body     __HSC_TELEWORK4 /fully qualified|no experience needed/is
body     __HSC_TELEWORK5 /work (?:online )?from home|process(?:ing)? rebates (?:at|from) home|set your own hours|100% no risk|Western Union fees/is
body     __HSC_TELEWORK6 /earning up to \d*USD|earn thousands of dollars|\d% commission/is
header      __HSC_TELEWORK7 Subject =~ /process rebates|easy work and great pay|making money today|earn money|vacancies in your city/i
meta     HSC_TELEWORK   (__HSC_TELEWORK1 + __HSC_TELEWORK2 + __HSC_TELEWORK3 + __HSC_TELEWORK4 + __HSC_TELEWORK5 + __HSC_TELEWORK6 + __HSC_TELEWORK7 >= 3)
describe HSC_TELEWORK   Stupid telework scam
score    HSC_TELEWORK   3.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '75', 
			'type' => 'meta', 
			'name' => '__HSC_MUSTREAD
', 
			'value' => 'header      __HSC_MUSTREAD1   Subject =~ /you (?:must|should|require|need|have) to read\.$/i
header      __HSC_MUSTREAD2   Subject =~ /^(?:Weighty|Very important|Serious|Momentous|Significant|Grand|Essential) (?:message|letter|note)\./i
meta     HSC_MUSTREAD   (__HSC_MUSTREAD1 + __HSC_MUSTREAD2 >= 1)
describe HSC_MUSTREAD   Subject indicative of a SPAM message
score    HSC_MUSTREAD   1.25
body     __HSC_DRILL1   /drilling/i
body     __HSC_DRILL2   /oil (company|partnership|and gas rights)/i
body     __HSC_DRILL3   /(exceed(ed)? .{0,10}expectations|see your brokers website)/i
body     __HSC_DRILL4   /(buy today|Check this deal out)/i
meta     HSC_DRILL   (HSC_MUSTREAD + __HSC_DRILL1 + __HSC_DRILL2 + __HSC_DRILL3 + __HSC_DRILL4 >= 4)
describe HSC_DRILL   Oil Drilling SPAM
score    HSC_DRILL   1.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '76', 
			'type' => 'meta', 
			'name' => '__HSC_STAR
', 
			'value' => 'body     __HSC_STAR1 /REMOVE ("\*"|space) (in the above|to make the) link/i
meta     HSC_STAR (__HSC_STAR1 >= 1)
describe HSC_STAR Stupid Obfuscated Link SPAMs
score    HSC_STAR 2.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '77', 
			'type' => 'meta', 
			'name' => '__HSC_SPAMKING
', 
			'value' => 'body     __HSC_SPAMKING1   /This advertisement is presented by/is
body     __HSC_SPAMKING2 /If you have any questions or concerns regarding this communication, please send correspondence/is
body     __HSC_SPAMKING3 /To .{0,30}(?:unsubscribe|stop|remove) .{0,35}(?:email|messages) from third party advertisers/is
body     __HSC_SPAMKING4 /notify .{0,30} that you no longer wish to receive (?:promotional )?messages/is
body     __HSC_SPAMKING5 /This (communication|message) was delivered to you by/is
body     __HSC_SPAMKING6 /(?:please send|Forward postal) correspondence to/is
meta     HSC_SPAMKING   (__HSC_SPAMKING1 + __HSC_SPAMKING2 + __HSC_SPAMKING3 + __HSC_SPAMKING4 + __HSC_SPAMKING5 + __HSC_SPAMKING6 >= 3)
describe HSC_SPAMKING   SPAM using throw-away domains and addresses.  SpamKing's Heir!
score    HSC_SPAMKING   1.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '78', 
			'type' => 'meta', 
			'name' => '__HSC_LOTTO
', 
			'value' => 'body     __HSC_LOTTO1   /((you |e-?mail )(?:address,? )?(has |have )?(emerged as one of (the|our) winning|emerged as a category "A" Winner|came out as the winning coupon|emerged a winner|has won|(?:was |is )?attached( to)?\s+(winning number|serial|ticket|reference)|was one of the ten winners|has been selected as one of the lucky)|random selection in our computerized email selection system|procuring your prize|email id identified with coupon|e-mail addresses are picked randomly|send your winning identification|final recipients? of a cash|selected as the one of the beneficiaries|receiving your donation)/is
body     __HSC_LOTTO2   /((ticket|serial|lucky) number|secret pin ?code|pin number|batch number|reference number|promotion date|lottery|sweepstake|\d* lucky recipients|for claim and inquiring)/is
body     __HSC_LOTTO3   /(won|claim|cash prize|pounds? sterling|over \$500|award sum of US\$|NOTIFICATION FOR CASH AID)/is
body     __HSC_LOTTO4   /(claims (office|agent|manager)|lottery coordinator|(certificate|fiduciary) (officer|agent)|fiduaciary claims|accredited agent|payment agency board|promotion manager|promotions? department|Name of +Agent:|executive secretary|claims & Management|lottery approved courier)/is
body     __HSC_LOTTO5   /(POWERBALL LOTTO|freelotto group|Royal Heritage Lottery|(British|UK) National( Online)? Lottery|U\.?K\.? Grand Promotions|Lottery Department UK|Euromillion Loteria|Luckyday International Lottery|International Lottery|Euro - Afro Asian Sweepstake|urawinner|Free Lotto Sweepstakes|PROMOTION DEPARTMENT|PROMOTION\/PRIZE AWARD|Nederlandse Internationale Loterij|EURO MILLIONS|APPLE LOTTERY ONLINE|MSW MEGA JACKPOT|MICROSOFT EMAIL PROMO|MSNlottery|ECOWAS|Nigeria|National Lottery)/is
body     __HSC_LOTTO6    /(Dear (Award|Consultation Prize|Lucky) Winner|Winning Notification|Attention:Winner|Dear:? Winner|Amount won:|Sincere Congratulations|Lucky Numbers:|you are a winner|prize attached|prize notification|claims requirement|winning number|winning sum|payout of|qualification number)/is
header      __HSC_LOTTO7   Subject =~ /(Your Lucky Day|Final Notice|CONGRATULATION|(Attention:|ONLINE) WINNER|Winning Notification|Claim Fund|YOU HAVE WON|Online Notification|Your Winning Amount|PROMOTIONS MANAGER|Winnin?g Alert|NOTICE FOR YOUR CLAIM|PRIZE WINNER|Reference Number)/i
header      __HSC_LOTTO8    From =~ /Lottery/i
meta     HSC_LOTTO1  (__HSC_LOTTO1 + __HSC_LOTTO2 + __HSC_LOTTO3 + __HSC_LOTTO4 + __HSC_LOTTO5 + __HSC_LOTTO6 + __HSC_LOTTO7 + __HSC_LOTTO8 >= 3)
describe HSC_LOTTO1  Likely to be an e-Lotto Scam Email
score    HSC_LOTTO1  0.5
meta            HSC_LOTTO2      (__HSC_LOTTO1 + __HSC_LOTTO2 + __HSC_LOTTO3 + __HSC_LOTTO4 + __HSC_LOTTO5 + __HSC_LOTTO6 + __HSC_LOTTO7 + __HSC_LOTTO8 >= 4)
describe        HSC_LOTTO2      Highly Likely to be an e-Lotto Scam Email
score           HSC_LOTTO2      1.0
meta            HSC_LOTTO3      (__HSC_LOTTO1 + __HSC_LOTTO2 + __HSC_LOTTO3 + __HSC_LOTTO4 + __HSC_LOTTO5 + __HSC_LOTTO6 + __HSC_LOTTO7 + __HSC_LOTTO8 >= 5)
describe        HSC_LOTTO3      Almost certain to be an e-Lotto Scam Email
score           HSC_LOTTO3      2.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '79', 
			'type' => 'meta', 
			'name' => '__HSC_ABOUT
', 
			'value' => 'header      __HSC_ABOUT1   Subject =~ /About your Internet (activities|activity)/i
body     __HSC_ABOUT2    /Spyware/i
meta     HSC_ABOUT   (__HSC_ABOUT1 + __HSC_ABOUT2 >=2)
describe HSC_ABOUT   Email Scam Hawking Anti-Spyware
score    HSC_ABOUT   1.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '80', 
			'type' => 'meta', 
			'name' => '__HSC_ADVERT
', 
			'value' => 'body     __HSC_ADVERT1   /email advertising/is
body     __HSC_ADVERT2  /instant traffic (to your website|and sales)/is
body     __HSC_ADVERT3   /Email Ad Broadcast|Double OPT IN list/is
header      __HSC_ADVERT4   Subject =~ /(get (instant|more) (sales|business|orders)|instant traffic, leads and sales|within 24 hours|increase in business|Ten Time Increase in Sales and Traffic|Emails Sent to Get You Sales)/i
meta     HSC_ADVERT  (__HSC_ADVERT1 + __HSC_ADVERT2 + __HSC_ADVERT3 + __HSC_ADVERT4 >= 4)
describe HSC_ADVERT  Mailing List Scammers Hawking Their Lists / Services
score    HSC_ADVERT  2.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '81', 
			'type' => 'meta', 
			'name' => '__HSC_
', 
			'value' => 'body     __HSC_1LINE1   /(free score and report|Did you overpay\?)/is
header      __HSC_1LINE2   Subject =~ /(free online score & report|I need tax savings? tip)/i
meta     HSC_1LINE   (__HSC_1LINE1 + __HSC_1LINE2 >= 2)
describe HSC_1LINE   One liner SPAMs
score    HSC_1LINE   2.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '82', 
			'type' => 'meta', 
			'name' => '__HSC_GIFT
', 
			'value' => 'body     __HSC_GIFT1 /(Claim your free \$500 Target Gift Card|complimentary gift-?card|received a Victoria's Secret Giftcard|\$500 airline gift card|\$1000 gift card for you to shop|\$\d+ gift card|Secret gift card)/is
body     __HSC_GIFT2 /(unsubscribe from this advertiseme(tn|nt)|exit future communications|to unsubscribe from this|to stop any offers from us)/is
body     __HSC_GIFT3 /every girl loves to buy|do you need a new|offer pass you by/i
body     __HSC_GIFT4 /card will be yours free|card on us|buy you the dyson animal/i
body     __HSC_GIFT5 /member incentive program/i
header      __HSC_GIFT6 From =~ /\$\d+ ?gift ?card/i
meta     HSC_GIFT (__HSC_GIFT1 + __HSC_GIFT2 + __HSC_GIFT3 + __HSC_GIFT4 + __HSC_GIFT5 + __HSC_GIFT6 >= 2)
describe HSC_GIFT Gift Card Scams
score    HSC_GIFT 2.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '83', 
			'type' => 'meta', 
			'name' => '__HSC_SHOP
', 
			'value' => 'body     __HSC_SHOP1 /chosen to participate as a Mystery Shopper/is
body     __HSC_SHOP2 /Do you like to shop/is
body     __HSC_SHOP3 /make money while you shop/is
meta     HSC_SHOP (__HSC_SHOP1 + __HSC_SHOP2 + __HSC_SHOP3 >= 3)
describe HSC_SHOP Mystery Shopper Scams
score    HSC_SHOP 2.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '84', 
			'type' => 'meta', 
			'name' => '__HSC_BIZ
', 
			'value' => 'body     __HSC_BIZ1  /You always need new cards|free full color business cards|get 250 more ?- ?free|business card offer|500 business cards/is
header      __HSC_BIZ2  Subject =~ /(do not pay for|Stop paying for|free) business cards|get( your)? 250 Free|BOGO|500 cards for|all for \$1\.99/i
header      __HSC_BIZ3  From =~ /Free Business Cards|Custom Printing|Premium Cards/i
meta     HSC_BIZ     (__HSC_BIZ1 + __HSC_BIZ2 + __HSC_BIZ3 >= 2)
describe HSC_BIZ     Free Business Card Emails
score    HSC_BIZ     2.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '85', 
			'type' => 'meta', 
			'name' => '__HSC_FDA
', 
			'value' => 'body     __HSC_FDA1  /statements.{1,10}not.{1,10}evaluated.{1,10}(FDA|Food ?(and|&) ?Drug Administration)/i
body     __HSC_FDA2  /not intended to diagnose,? treat,? cure,? or prevent/i
body     __HSC_FDA3  /FDA Recall/i
meta     HSC_FDA     (__HSC_FDA1 + __HSC_FDA2 + __HSC_FDA3)
describe HSC_FDA     Carries a not evaluated by the FDA warning or recall warning
score    HSC_FDA     0.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '86', 
			'type' => 'meta', 
			'name' => '__HSC_WEIGHT
', 
			'value' => 'body     __HSC_WEIGHT1  /(overweight|extra weight|glutting|shed fat|burns fat|burn calories|appetite suppressant|stimulate your metabolism|unwanted weight|duet of the year|healthy energy boost|Suppresses Appetite|internal cleansing|detoxify|cellulite|unsightly bulges|fat burn|Diet of the year|acai|cuts cholesterol|cleanse excess waste|free sample|unwanted weight|Acai suppl[ie]ments)/is
body     __HSC_WEIGHT2  /(\d pounds|lose[_ ]weight|suppress appetite|appetite out of control|Oprah|for cancer patients|colon cure|colon cleanse|colonmate|avai berry|acai burn|ultraslim|feel energized|excess[_ ]weight|no diet changes|no exercise|hollywood'?s hottest -?diet|acai berry edge|Acai Diet|top secret diet)/is
header      __HSC_WEIGHT3   Subject =~ /(leaner|slimmer|stop gaining weight|fat loss|weight management|now available without a script|green Tea|wuYi tea|(drop|lost) \d* pounds|FRS Healthy Energy|instant diet|colonmate|trimmer you|body cleanse|acai berry|acai burn|Fatburner|cholesterol reduction|cholestapro|Ephedra|W[EA]IGHT[- ]LOSS PRODUCT OF THE YEAR|t-r-i-a-l|try our trial|cleanse your system|no exc?ercise|Acai Advanced|toxic sludge|cleanse your body|Acai Diet|Acai Elite|Acai Super|losing weight fast)/i
body     __HSC_ANA1  /(anatrim|Green ?Tea|cortitherm|PHENTERTHIN|Phentremine|Acai Ultra|Civ-xR|WuYi Tea|Wu-?Yi Source|FRS Healthy Energy|Acai Berry|Chinese secret|Ephedra|Cholestapro|ColonMedic|Pure Cleanse|AcaiBurn|Acai Elite)/i
header      __HSC_ANA2  From =~ /green ?tea|Ultra ?Energy|weight ?loss|colon? ?clean|colon ?aid|acai|As seen on/i
meta     HSC_ANA     (__HSC_ANA1 + __HSC_ANA2 + __HSC_WEIGHT1 + __HSC_WEIGHT2 + __HSC_WEIGHT3 + HSC_FDA + __HSC_HTML1 >= 3)
describe HSC_ANA     Likely Weight-loss / Medical Spam
score    HSC_ANA     3.25
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '87', 
			'type' => 'meta', 
			'name' => '__HSC_REP
', 
			'value' => 'body     __HSC_REP1  /Replace \[?[-!~\.]\]? with \./is
body     __HSC_REP2  /www\s+[-!~\.]/i
body            __HSC_REP2_1    /(Just|Please|all you need to do is to) (copy|type):? (www\s)?.{0,10}[\[\(]([-!~\.]|dot)[\]\)]/is
body            __HSC_REP2_2    /in your (IE|internet|explorer|browser)/i
body     __HSC_REP3_1   /\*omit empty spaces/is
body     __HSC_REP3_2   /.\s+(COM|org|net|info)$/i
meta     HSC_REPLACE (__HSC_REP1 + __HSC_REP2 >= 2) || (__HSC_REP2_1 + __HSC_REP2_2 >=2) || (__HSC_REP3_1 + __HSC_REP3_2 >=2)
describe HSC_REPLACE Spams that use obfuscated URLs with instructions
score    HSC_REPLACE 2.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '88', 
			'type' => 'meta', 
			'name' => '__HSC_NIGERIAN
', 
			'value' => 'body     __HSC_NIGERIAN1   /(?:payment officer|personal treasurer|experienced marketers|Chairman of the Finance Committee|contact my secretary|field of Financial Services|Head of Human Resources|Public Relation Officer|field of Business Services|payment agent|representing partner|vacancy in my company|representative\/book ?keeper|executor|search and selection of both experienced|retired chief economist|foreign partner|diplomatic courier|senior auditor|online book-?keeper)/is
body     __HSC_NIGERIAN2   /(?:looking for dynamic representative|seek your partnership|new online business model|seek to transfer this money|completely legal activity|never ask you to pay or invest|in search of trustworthy representatives|establishing a new liaison network|rec[ei]{2}ving payment on our behalf|assist me in transferring those funds|make money at home|requiring rep to work on a part time|part time job\/full time|organization for the good work of the lord|job search directory|investor willing to invest in lebanon|invest in Real Estate|Your kind assistance|next of kin)/is
body     __HSC_NIGERIAN3   /(?:\d{1,2}\% (?:commission on each transaction|of the total will be set|will be mapped out|is made available to you|of the total sum for your partner|of the money for your effort|for\s+sales)|pay for performance|floating deficit|for your compensation|financial independence|their financial dreams|work from home part\s*-?\s*time|employing your services|get extra income|deduct your weekly salary \d\d%|transfer of the funds|make successful career at us|you will get \d{1,2}% on each|funds can be directed to your account as a grant|reasonable parentage|dormant domiciliary account|share would be \d+\%|pay you \d+%)/is
body     __HSC_NIGERIAN4   /(?:American oil merchant|independent contractor|removallink|claim the funds|international corporation|bank draft|becoming our contract staff|contractual employment|customers\s*in Europe,\s*America|new partner from UK|great investment site|money orders|cashiers check|access to the funds|piloting the business|moving the funds|next of kin)/is
body     __HSC_NIGERIAN5 /Western Union Money Transfer|Money Gram|form of Money Orders|to apply for this job, please send the following|process our payments|not traceable|risk free transation|transfer to a designated bank account|inheritance return/i
meta     HSC_NIGERIAN   (__HSC_NIGERIAN1 + __HSC_NIGERIAN2 + __HSC_NIGERIAN3 + __HSC_NIGERIAN4 + __HSC_NIGERIAN5 + __HSC_REFI4 >= 4)
describe HSC_NIGERIAN   Nigerian Scam and Variants
score    HSC_NIGERIAN   2.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '89', 
			'type' => 'meta', 
			'name' => '__HSC_LIKE
', 
			'value' => 'body     __HSC_LIKE1 /been working (extremely|very) hard on my friend's website/is
body     __HSC_LIKE2 /a link from .{1,54} would be greatly appreciated/is
body     __HSC_LIKE3 /(link exchange|in return to me linking back)/is
body     __HSC_LIKE4 /HTML code for the link/is
body     __HSC_LIKE5 /I apologize if this message was sent, in error/is
meta     HSC_LIKE (__HSC_LIKE1 + __HSC_LIKE2 + __HSC_LIKE3 + __HSC_LIKE4 + __HSC_LIKE5 >= 5)
describe HSC_LIKE I like your website link exchange spam
score    HSC_LIKE 2.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '90', 
			'type' => 'meta', 
			'name' => '__HSC_SEX
', 
			'value' => 'body     __HSC_SEX1  /(?:double[ -]?headed|pornstar|huge weenie|male power|\d\dper\. of men|male enhancement product|enlarge patch|boost up your virility|clinically tested|improve manhood|Bigger Pen..is|Big Penis|incredible gains to your manhood|muscular manhood|nights unsatisfied|climaxes|sensual enhancer|love instrument|bigger member|excitement with girls|fucker|animal sex)/i
body     __HSC_SEX2  /(?:cunt|busty|interracial|hardcore|peni(s|le) enlarge|generic quality|enlarge your manhood|stone-hard manhood|XXL Dick|intense pleasure|spend a night with you|efficient medicine|turn on your wife|with your boner|dick dangl)/i
header      __HSC_SEX3  Subject =~ /(double dildo|bunsfuck|dominatrix|huge tits|anti-ED|most confident man|for men over 30|peni(s|le) enlargement|interracial gobble|bitch sucking dong|product actually does work|update your penis|mans mall|endurerx|more excitement|love package|add more fire|her best male|average guys|monster cocks|first anal|anal fucking|love with monsters|horse sex|be the stud)/i
body     __HSC_SEX4  /(?:bring your girlfriend back|satisfied with their size|penis so huge and heavy|more semen|volume of your loads|wondercum|ejaculate|bargain offers on medic|improve xxx|improve your lovemaking|youngest teen|teen pics|monster in his pants|female orgasms|extreme penetration)/i
describe HSC_SEX     Sexually Explicit SPAM / Penis Enlargement Scam
meta     HSC_SEX     (__HSC_SEX1 + __HSC_SEX2 + __HSC_SEX3 + __HSC_SEX4 + __HTML_IMG_ONLY + (__HSC_VIAGRA6A + __HSC_VIAGRA6E + __HSC_VIAGRA7A >= 1) >= 2)
score    HSC_SEX     7.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '91', 
			'type' => 'meta', 
			'name' => '__HSC_PIC
', 
			'value' => 'body     __HSC_PIC1      /(tired|bored) (this )?(today|tonight|evening|morning|afternoon)/is
body     __HSC_PIC2      /(nice|25 y.o.|pretty russian|I russian) girl/is
body     __HSC_PIC3  /like to chat|feelings can be true/is
body     __HSC_PIC4  /(like to share some of my pics|some (?:great )?pictures of me|sending some of my pictures|To see my pic|hope you like my pic|will reply with my pics|show you some pic|chat with me and see|that's my photo)/is
body     __HSC_PIC5  /picture|photo|my pics/i
meta     HSC_PIC     (__HSC_PIC1 + __HSC_PIC2 + __HSC_PIC3 + __HSC_PIC4 + __HSC_PIC5 >= 4)
describe HSC_PIC     Share Pictures and Chat SPAM
score    HSC_PIC     3.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '92', 
			'type' => 'meta', 
			'name' => '__HSC_LIST
', 
			'value' => 'body     __HSC_LIST1 /((Hospital|MD) directory|Nursing Home (List|directory)|doctor lists|marketing lists|Licensed Physicians|practicing MDs|practicing Medical doctors|Physicians in America|emails for every state|(laywers|planners) database)/is
body     __HSC_LIST2 /(?:hospital|dentist|chiropractor|physician|medical doctors|nursing directors|medical marketing|\d sortable fields|records all with emails)/is
body     __HSC_LIST3 /price\:/is
body     __HSC_LIST4 /(?:database|list|[\d,]+ (total records|e-?mails))/is
body     __HSC_LIST5 /(reply with "stop" as a subject|Send an email with "rem" in the subject to discontinue|put "cease" in the subject of an email|for termination of this e?mail|reply with .{1,8} in the subject)|you will have your email taken off|for the datacard/is
header      __HSC_LIST6 Subject =~ /Database of (neurological|surgeons|doctors|nurses|mds)|MD Database|looking for list|email database|we have that list/i
meta     HSC_LIST (__HSC_LIST1 + __HSC_LIST2 + __HSC_LIST3 + __HSC_LIST4 + __HSC_LIST5 + __HSC_LIST6 >= 4)
describe HSC_LIST Mailing List Database SPAM
score    HSC_LIST 3.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '93', 
			'type' => 'meta', 
			'name' => '__HSC_DRUG
', 
			'value' => 'body     __HSC_DRUG1     /Quality and cheap|premier quality|supor-collosal mixture|Discount-?Pharmacy/is
body     __HSC_DRUG2 /cheaper|redeem in bulk and save|bigger quantities and Save|drugstore accredi[dt]ations|economical (?:value|amount)/is
rawbody     __HSC_DRUG3 /local drugstore|(hush-hush|secret) with no waiting rooms|confidential package|distributed securely|shape is our main concern/is
body     __HSC_DRUG4 /click to buy|no previous doctors direction|No prescript[oi]{2}n needed|no script necessary|medicine assistance supplier|mail[- ]?order medicine/is
meta     HSC_DRUG (__HSC_DRUG1 + __HSC_DRUG2 + __HSC_DRUG3 + __HSC_DRUG4 + __HSC_VIAGRA6A + __HSC_VIAGRA7A + HSC_REPLACE >= 4)
describe HSC_DRUG More Viagra, Medicine, et al Scams
score    HSC_DRUG 2.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '94', 
			'type' => 'meta', 
			'name' => '__HSC_GOODIPHTTP
', 
			'value' => 'rawbody            __HSC_GOODIPHTTP        /https?:\/\/(192\.168|10\.)/i
rawbody            __HSC_IPHTTP            /https?:\/\/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/i
describe        HSC_BADIPHTTP           Due to the Storm Bot Network, IPs in emails is bad
score           HSC_BADIPHTTP           2.0
meta            HSC_BADIPHTTP           (__HSC_IPHTTP - __HSC_GOODIPHTTP >= 1)
body     __HSC_HIDDEN_URI1 /\[DOT\]com/is
body     __HSC_HIDDEN_URI2 /replace "?\[DOT\]/is
meta     HSC_HIDDEN_URI    (__HSC_HIDDEN_URI1 + __HSC_HIDDEN_URI2 >= 2)
describe HSC_HIDDEN_URI    URI obfuscation techniques
score    HSC_HIDDEN_URI    4.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '95', 
			'type' => 'meta', 
			'name' => '__HSC_HEALTH
', 
			'value' => 'body            __HSC_HEALTH2_1   /affordable health coverage/i
header          __HSC_HEALTH2_2   Subject =~ /health insurance quote/i
describe        HSC_HEALTH2     Health Insurance Spam Emails
score           HSC_HEALTH2     3.0
meta            HSC_HEALTH2     (__HSC_HEALTH2_1 + __HSC_HEALTH2_2 + HTML_MESSAGE >= 3)
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '96', 
			'type' => 'meta', 
			'name' => '__HSC_REAL
', 
			'value' => 'body     __HSC_REAL2_1  /(?:Property available|on the water|costa rica)/i
body     __HSC_REAL2_2  /(?:pre-development prices|finish building|torn down to build|exclusive place)/i
body     __HSC_REAL2_3  /(?:unbelievable deals|buyer with CA[s\$]h|pennies.on.the.dollar)/i
body     __HSC_REAL2_4  /(?:home sites|raw land|vacation home)/i
body     __HSC_REAL2_5  /(?:developers|estates|buyer flying in|retirement plans)/i
meta     HSC_REAL2   (__HSC_REAL2_1 + __HSC_REAL2_2 + __HSC_REAL2_3 + __HSC_REAL2_4 + __HSC_REAL2_5 >= 5)
describe HSC_REAL2   Real-estate investment scams
score    HSC_REAL2   1.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '97', 
			'type' => 'meta', 
			'name' => 'HSC_BADPDF
', 
			'value' => 'ifplugin Mail::SpamAssassin::Plugin::PDFInfo

  describe  HSC_BADPDF  Prevalent Junk PDF SPAMs - BAD SUBJECT
  score     HSC_BADPDF  2.5
  header    HSC_BADPDF  Subject =~ /(?:^.{0,15}(document|confirmation|marketwatch|pinksheets|wire info|pinksheets|investor_report|proposal|invest_today|alert|invoice|investor_letter|check)-\d{5,12}$|^basic[- _]chart-|^Active[- _](stocks|trader)|^Analyst[- _]Coverage|^Income[- _](report|details|statement)|^Market[- _](advice|watch)|^Investor[- _]news|^real-?time[- _]quotes)/i
  describe  HSC_BADPDF1    Prevalent Junk PDF SPAMs - EMPTY BODY & ENCRYPTED
  score     HSC_BADPDF1 2.5
  meta            HSC_BADPDF1     (GMD_PDF_EMPTY_BODY + GMD_PDF_ENCRYPTED >= 2)
  describe        HSC_BADPDF2     Prevalent Junk PDF SPAMs - 3 STRIKES
  score           HSC_BADPDF2     2.5
  meta            HSC_BADPDF2     (HSC_BADPDF + HSC_BADPDF1 + MISSING_SUBJECT >= 2) && (HSC_RPTR_SUSPECT + HSC_RPTR_FAILED >=1)

endif

', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '98', 
			'type' => 'meta', 
			'name' => '__HSC_FAKEPDF
', 
			'value' => 'body     __HSC_FAKEPDF1 /Download PDF Reader.Writer/is
body     __HSC_FAKEPDF2 /Reader 2010/is
header      __HSC_FAKEPDF3  From =~ /adobe/is
header      __HSC_FAKEPDF4  Subject =~ /reader.writer version 2010/is
meta     HSC_FAKEPDF (__HSC_FAKEPDF1 + __HSC_FAKEPDF2 + __HSC_FAKEPDF3 + __HSC_FAKEPDF4 >= 3)
describe HSC_FAKEPDF Fake PDF Reader / Writer
score    HSC_FAKEPDF 4.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '99', 
			'type' => 'meta', 
			'name' => '__HSC_PHISH
', 
			'value' => 'header      __HSC_PHISH2_1 Subject =~ /(VACU Message|Virgini?a Credit|Account Verification|account might be compromised)/i
body     __HSC_PHISH2_2 /Virginia Credit Union|Lloyds/is
rawbody     __HSC_PHISH2_3 /https?:\/\/.{5,30}\.(kr|hk|edu)\//i
body     __HSC_PHISH2_4 /unauthori[sz]ed use/i
body     __HSC_PHISH2_5 /account suspension/i
body     __HSC_PHISH2_6  /confirm your online banking details/i
body     __HSC_PHISH2_7  /extra security check/i
meta     HSC_PHISH2  (__HSC_PHISH2_1 + __HSC_PHISH2_2 >= 2) && ((__HSC_IPHTTP + __HSC_PHISH2_3 >= 1) || (__HSC_PHISH2_4 + __HSC_PHISH2_5 + __HSC_PHISH2_6 + __HSC_PHISH2_7 >= 4))
describe HSC_PHISH2  Prevalent Phishing Scam emails
score    HSC_PHISH2  2.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '100', 
			'type' => 'meta', 
			'name' => '__HSC_HEX
', 
			'value' => 'body     __HSC_HEX1  /^[a-f0-9]{8}(\b|$)/i
header      __HSC_HEX2  Subject =~ /^\d{5,6}$/
meta     HSC_HEX     (__HSC_HEX1 + __HSC_HEX2 >= 2)
describe HSC_HEX     Crazy Empty Hex Messages
score    HSC_HEX     2.1
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '101', 
			'type' => 'meta', 
			'name' => '__HSC_MAILER
', 
			'value' => 'body     __HSC_MAILER1  /{!firstname_fix}/i
describe HSC_MAILER  Automated Mailer Tag Left in Email
meta     HSC_MAILER  (__HSC_MAILER1 >= 1)
score    HSC_MAILER  2.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '102', 
			'type' => 'meta', 
			'name' => '__HSC_CHECK
', 
			'value' => 'body     __HSC_CHECK1   /delivery fee for your che(que|ck) draft/i
body     __HSC_CHECK2   /let me know when you recieve your money/i
meta     HSC_CHECK   (__HSC_CHECK1 + __HSC_CHECK2 + __HSC_REFI4 >= 3)
describe HSC_CHECK   Another Nigerian Bank Draft Scam
score    HSC_CHECK   3.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '103', 
			'type' => 'meta', 
			'name' => '__HSC_OPRAH
', 
			'value' => 'body     __HSC_OPRAH1   /airfare/i
body     __HSC_OPRAH2   /hotel/i
body     __HSC_OPRAH3   /oprah/i
header      __HSC_OPRAH4   Subject =~ /see\s+.*oprah\s+.*live/i
meta     HSC_OPRAH   (__HSC_OPRAH1 + __HSC_OPRAH2  + __HSC_OPRAH3 + __HSC_OPRAH4 >= 4)
describe HSC_OPRAH   SPAMs re: Oprah Winfrey Show
score    HSC_OPRAH   2.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '104', 
			'type' => 'meta', 
			'name' => '__HSC_EBAY
', 
			'value' => 'body     __HSC_EBAY1 /Succeed on ebay|thousands with ebay|ebay success|money-making secret/i
body     __HSC_EBAY2 /Auction success kit|Great Money Maker|documented program|Chuck Mullaney|more bills than money/i
header      __HSC_EBAY3 Subject =~ /ebay .*for dummies|ebay expert|work online|ebay business|secrets to ebay|Chuck Mullaney|living on ebay|build a business|huge cash flows/i
meta     HSC_EBAY (__HSC_EBAY1 + __HSC_EBAY2 + __HSC_EBAY3 >= 3)
describe HSC_EBAY SPAMs re: eBay Auction Tips
score    HSC_EBAY 3.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '105', 
			'type' => 'meta', 
			'name' => '__HSC_GAS
', 
			'value' => 'body     __HSC_GAS1  /Gas prices are at an? all time high|\$\d per gallon/i
body     __HSC_GAS2  /We have a solution|save \d* cents per gallon/i
header      __HSC_GAS3  Subject =~ /High Gas Prices|ripped off for gas|Save \d*c per gallon/i
header      __HSC_GAS4  From =~ /gas/i
meta     HSC_GAS     (__HSC_GAS1 + __HSC_GAS2 + __HSC_GAS3 + __HSC_GAS4 >=3)
describe HSC_GAS     SPAMs re: High Gas Prices
score    HSC_GAS     4.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '106', 
			'type' => 'meta', 
			'name' => '__HSC_TV
', 
			'value' => 'body     __HSC_TV1   /watch unlimited television|DTV4PC|Online TV Code|Free DVD-CD Burner|100% legal/i
body     __HSC_TV2   /without a monthly fee|pay a cable or satellite bill|no monthly fee|watch uncensored|movies online|no censorship/i
header      __HSC_TV3   Subject =~ /watch uncensored tv|digital TV|internet TV|Free TV|tv online for free/i
header      __HSC_TV4   From =~ /Unlock Internet TV|Movie Download/i
describe HSC_TV      Free TV/Cable/etc. Scams
meta     HSC_TV      (__HSC_TV1 + __HSC_TV2 + __HSC_TV3 + __HSC_TV4 >= 2)
score    HSC_TV      3.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '107', 
			'type' => 'meta', 
			'name' => '__HSC_PILLS
', 
			'value' => 'header      __HSC_PILLS1   Subject =~ /save \d\d% on your (pills|drugs|medications)/i
body     __HSC_PILLS2   /be (thrifty|smart|clever), buy your (pills|drugs|medications)/i
describe HSC_PILLS   Spam for scam pharmacy
meta     HSC_PILLS   (__HSC_PILLS1 + __HSC_PILLS2 >=2)
score    HSC_PILLS   4.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '108', 
			'type' => 'meta', 
			'name' => '__HSC_ALT
', 
			'value' => 'body     __HSC_ALT1  /reply to my alternative E-?mail/is
describe HSC_ALT     Requests use of an alternate email which may indicate spam
meta     HSC_ALT     (__HSC_ALT1 >= 1)
score    HSC_ALT     0.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '109', 
			'type' => 'meta', 
			'name' => '__HSC_POLITICS
', 
			'value' => 'header      __HSC_POLITICS1   From =~ /Right vs Left|Minuteman|Senator Sam Brownback|Pennsylvania Transportation Partners|Americans for Limited Government/i
body     __HSC_POLITICS2   /Minuteman Civil Defense Corps|National Campaign Fund|Right vs Left|Restore America PAC|penntransportation.com|getliberty.org|Americans for Limited Government/i
header      __HSC_POLITICS3 Received =~ /\.politicalsystems.net /i
describe HSC_POLITICS   Unsolicited Political E-Mails
meta     HSC_POLITICS   (__HSC_POLITICS1 + __HSC_POLITICS2 + __HSC_POLITICS3 >= 2)
score    HSC_POLITICS   2.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '110', 
			'type' => 'meta', 
			'name' => '__HSC_COMPANY
', 
			'value' => 'header      __HSC_COMPANY1 From =~ /W\$[LM]( |_)(Insurance|Mortgage)( |_)New\$/i
describe HSC_COMPANY1   Egregious spammers that should also be on RBLs (and might be)
meta     HSC_COMPANY1   (__HSC_COMPANY1 >= 1)
score    HSC_COMPANY1   2.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '111', 
			'type' => 'meta', 
			'name' => '__HSC_COMPANY
', 
			'value' => 'body           __HSC_COMPANY2_1  /Member Services MGM, LLC/is
describe        HSC_COMPANY2     Egregious spammers that should also be on RBLs (and might be)
meta            HSC_COMPANY2        (__HSC_COMPANY2_1 >= 1)
score           HSC_COMPANY2     1.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '112', 
			'type' => 'meta', 
			'name' => '__HSC_COMPANY
', 
			'value' => 'header         __HSC_COMPANY3_1        Reply-To =~ /inspironmarket.com|leftwingward.com|tellumnet.com|gettheham.info|staringhook.com|zinccarbon.info|swimmingbedroom.com|jacksop.info|onetwobest.info|gazestarz.info|teamgreenbean.info|thewebbanana.info|snowingmasher.info|navinthebean.info|societu.info|firthlapins.info|tomatocorn.info|treeoxygen.info|thebeancoffee.info|grapeagreement.info|snowingguild.info|discountstudent.info|onethreebest.info|endivetaste.info|socialbeancoffee.info|jetsad.info|stewcarrot.info|giftlarge.info|snowinguild.info|echoist.info|grubbye.info|onefourbest.info|snowingtodoor.info|experm.info|flyingtrap.info|carribeanbanks.info|toyprogame.info|lianana.info|choosethestories.info|socious.info|reprole.info|lightgrey.info|funkybeancoffee.info|shiftylefty.info|storiesalon.info|onefivebest.info|storiesburn.info|thebeansoup.info|greatestrates.info|tvtoystore.info|buyboytoy.info|gametoystore.info|toystorepro.info|toytechworld.info|alltoysite.info|acetoybox.info|confirmblock.info|schnoodleoh.com|shihtzuak.com|westieri.com|fudgeblade.info|abouttimeshare.info|exceededgaps.info|dailyachronicle.info|dailykjournal.info/i
header         __HSC_COMPANY3_2        From =~ /inspironmarket.com|leftwingward.com|tellumnet.com|gettheham.info|staringhook.com|zinccarbon.info|swimmingbedroom.com|jacksop.info|onetwobest.info|gazestarz.info|teamgreenbean.info|thewebbanana.info|snowingmasher.info|navinthebean.info|societu.info|firthlapins.info|tomatocorn.info|treeoxygen.info|thebeancoffee.info|grapeagreement.info|snowingguild.info|discountstudent.info|onethreebest.info|endivetaste.info|socialbeancoffee.info|jetsad.info|stewcarrot.info|giftlarge.info|snowinguild.info|echoist.info|grubbye.info|onefourbest.info|snowingtodoor.info|experm.info|flyingtrap.info|carribeanbanks.info|toyprogame.info|lianana.info|choosethestories.info|socious.info|reprole.info|lightgrey.info|funkybeancoffee.info|shiftylefty.info|storiesalon.info|onefivebest.info|storiesburn.info|thebeansoup.info|greatestrates.info|tvtoystore.info|buyboytoy.info|gametoystore.info|toystorepro.info|toytechworld.info|alltoysite.info|acetoybox.info|confirmblock.info|schnoodleoh.com|shihtzuak.com|westieri.com|fudgeblade.info|abouttimeshare.info|exceededgaps.info|dailyachronicle.info|dailykjournal.info/i
header         __HSC_COMPANY3_3        Received =~ /inspironmarket.com|leftwingward.com|tellumnet.com|gettheham.info|staringhook.com|zinccarbon.info|swimmingbedroom.com|jacksop.info|onetwobest.info|gazestarz.info|teamgreenbean.info|thewebbanana.info|snowingmasher.info|navinthebean.info|societu.info|firthlapins.info|tomatocorn.info|treeoxygen.info|thebeancoffee.info|grapeagreement.info|snowingguild.info|discountstudent.info|onethreebest.info|endivetaste.info|socialbeancoffee.info|jetsad.info|stewcarrot.info|giftlarge.info|snowinguild.info|echoist.info|grubbye.info|onefourbest.info|snowingtodoor.info|experm.info|flyingtrap.info|carribeanbanks.info|toyprogame.info|lianana.info|choosethestories.info|socious.info|reprole.info|lightgrey.info|funkybeancoffee.info|shiftylefty.info|storiesalon.info|onefivebest.info|storiesburn.info|thebeansoup.info|greatestrates.info|tvtoystore.info|buyboytoy.info|gametoystore.info|toystorepro.info|toytechworld.info|alltoysite.info|acetoybox.info|confirmblock.info|schnoodleoh.com|shihtzuak.com|westieri.com|fudgeblade.info|abouttimeshare.info|exceededgaps.info|dailyachronicle.info|dailykjournal.info/i
meta            HSC_COMPANY3            (__HSC_COMPANY3_1 + __HSC_COMPANY3_2 + __HSC_COMPANY3_3 >= 1)
describe        HSC_COMPANY3            Egregious spammers that should also be on RBLs (and might be)
score           HSC_COMPANY3            4.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '113', 
			'type' => 'meta', 
			'name' => '__HSC_MX
', 
			'value' => 'header      __HSC_MX1      Reply-To =~ /\@mx\d+\./i
header      __HSC_MX2      Return-Path =~ /\@mx\d+\./i
header      __HSC_MX3      Received =~ /(\(|\b)(pet|ptr|tech|host|mta|mx|vps|vsp|colo|sox|m)\d+\./i
header      __HSC_MX4      Received =~ /(\(|\b)[0-9A-F]{8}\.ptr\./i
header      __HSC_MX5      Received =~ /(\(|\b)[a-z]{2,4}[0-9]{1,3}\..{1,20}\.info/i
meta     __HSC_MX    (__HSC_MX1 + __HSC_MX2 + __HSC_MX3 + __HSC_MX4 + __HSC_MX5 >= 1)
describe __HSC_MX    Odd prevalence of mx records associated with the COMPANY3 Spammers
meta            HSC_MX2                 (__HSC_MX + HSC_COMPANY3 >= 2)
score           HSC_MX2                 5.0
describe        HSC_MX2                 COMPANY3 Spammers and MX Rule
meta            HSC_MX3                 (__HSC_MX + URIBL_BLACK >= 2 && HSC_MX2 == 0)
score           HSC_MX3                 4.1
describe        HSC_MX3                 Odd prevalence of MX records for non-identified Spammers
meta     HSC_MX4        (__HSC_MX5)
describe HSC_MX4        MX Record and dot info domains associated with COMPANY3 Spammers
score    HSC_MX4        3.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '114', 
			'type' => 'meta', 
			'name' => '__HSC_ADDRESS
', 
			'value' => 'body            __HSC_ADDRESS1          /204 N. El Camino Real|CocoMedia|17 Patchogue Road|1128-274 Royal Palm Beach|(848|500) N. Rainbow Dr. Ste \#?(2511|300)|CMI Free Stuff|Vista Del Mar Productions|by SuperClub|Buil tech Services|eMarketing Alliance|aSHARPi Media|Plaza Neptuno|ultimaterxhere|insanerx|speedymed4u|mightymeds1|coolestrxhere|hotrxmedspot|topshoprx|mightyrxhere|qualityrxmedz|legitrxlife|dealsformeds|simplyrxdeals|bestrxlight|ezprescriptz|reliablerxsource1|freetrusted-rx|hotmedsourcehere|CabinetOfMeds|mytrusted-rx|sexywebdating|RxwarehouseHere|WarehouseofRxMeds|GreatrxMedsRus|Satell Center for Executive Education|rxmedsrus|Pacific Shores Investments|rx ?unit|Cascio Interstate Music|mail2webmaster.com|treat-me.biz|electriklime.com|myvintageads.com|haveyouseenthesigns.com|ceu-media.com|newmommies.com|mach1realestate.com|sikamor.com|candrugs-c.com/i
meta            HSC_ADDRESS             (__HSC_ADDRESS1 >= 1)
describe        HSC_ADDRESS             Addresses and Companies prevalent in spams
score           HSC_ADDRESS             5.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '115', 
			'type' => 'meta', 
			'name' => '__HSC_GRASS
', 
			'value' => 'header          __HSC_GRASS1     From =~ /(Patch|Perfect|Lawn)/i
header      __HSC_GRASS2   Subject =~ /rich beautiful lawn|grow grass|grass seed on steroids/i
body     __HSC_GRASS3   /Grass Seed On Steroids|rich beautiful lawn|Patch Perfect Seeds|Grow Grass (anywhere|in the shade)/i
meta     HSC_GRASS   (__HSC_GRASS1 + __HSC_GRASS2 + __HSC_GRASS3 >= 3)
describe HSC_GRASS   Spammers hawking lawn products
score    HSC_GRASS   2.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '116', 
			'type' => 'meta', 
			'name' => '__HSC_SKIN
', 
			'value' => 'header          __HSC_SKIN1      From =~ /(Ped ?Egg|Healthy Feet|beautiful feet|belisi|skin tightener|medical|Wrinkle|Face ?Lift)/i
header          __HSC_SKIN2      Subject =~ /Ped ?Egg|Healthy Feet|beautiful feet|tighter skin|works for wrinkles|Sera Concepts|Wrinkle Eraser/i
body            __HSC_SKIN3      /Ped ?Egg|Belisi|Botox|Gabamed|Sera Concepts|Purelift/i
body     __HSC_SKIN4 /feet feel smooth and healthy|calluses and dead skin|silky smooth skin|tighter skin|\d years younger|anti[- ]aging|look younger/i
meta            HSC_SKIN       (__HSC_SKIN1 + __HSC_SKIN2 + __HSC_SKIN3 + __HSC_SKIN4 >= 3)
describe        HSC_SKIN       Spammers hawking skin/medical/foot products
score           HSC_SKIN       2.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '117', 
			'type' => 'meta', 
			'name' => '__HSC_CAR
', 
			'value' => 'header      __HSC_CAR1  Subject =~ /(save thousands|vehicle warranty|paying too much for auto|skyrocketing cost of car|car deals|deal on a new car|cheap(er)? auto insurance|warranty options|afford the car)/i
body     __HSC_CAR2  /buying a new car|dream car|new car you want|free auto insurance(?:-| )quote|save money on your auto|roadside assistance/i
body     __HSC_CAR3  /unbelievable payment terms|no commitment|free price quote|get competitive quotes|offering better rates|no obligation quote|Pay Later/i
header      __HSC_CAR4  From =~ /warranty|lender/i
meta     HSC_CAR       (__HSC_CAR1 + __HSC_CAR2 + __HSC_CAR3 + __HSC_CAR4 >= 2)
describe        HSC_CAR       Spammers hawking new car, insurance or warranties
score           HSC_CAR       2.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '118', 
			'type' => 'meta', 
			'name' => '__HSC_WARRANTY
', 
			'value' => 'header      __HSC_WARRANTY1  Subject =~ /home warranties/i
body     __HSC_WARRANTY2    /Protect your home/i
body     __HSC_WARRANTY3  /home warrant/i
meta     HSC_WARRANTY   (__HSC_WARRANTY1 + __HSC_WARRANTY2 + __HSC_WARRANTY3 >= 3)
describe HSC_WARRANTY   Spammers hawking home warranties
score    HSC_WARRANTY   1.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '119', 
			'type' => 'meta', 
			'name' => '__HSC_AUGER
', 
			'value' => 'header      __HSC_AUGER1   Subject =~ /Dig Holes|plant Trees/i
body     __HSC_AUGER2   /Awesome Auger/i
meta     HSC_AUGER   (__HSC_AUGER1 + __HSC_AUGER2 >= 2)
describe HSC_AUGER   Spammers hawking Awesome Augers?!?
score    HSC_AUGER   4.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '120', 
			'type' => 'meta', 
			'name' => '__HSC_MOVIE
', 
			'value' => 'header      __HSC_MOVIE1   Subject =~ /Movie Extra/i
body     __HSC_MOVIE2   /Movie Extra/i
meta     HSC_MOVIE   (__HSC_MOVIE1 + __HSC_MOVIE2 >= 2)
describe HSC_MOVIE   Spammers hawking Movie Extra positions
score    HSC_MOVIE   3.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '121', 
			'type' => 'meta', 
			'name' => '__HSC_COLLECT
', 
			'value' => 'header      __HSC_COLLECT1 Subject =~ /You Pay Nothing/i
body     __HSC_COLLECT2 /No Fee/i
body     __HSC_COLLECT3 /collection professionals/i
body     __HSC_COLLECT4  /recovery rate/i
meta     HSC_COLLECT (__HSC_COLLECT1 + __HSC_COLLECT2 + __HSC_COLLECT3 + __HSC_COLLECT4 + __HSC_SEARCH5 + HSC_ADVERT2 >= 4)
describe HSC_COLLECT Spammers hawking debt collection
score    HSC_COLLECT 5.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '122', 
			'type' => 'meta', 
			'name' => '__HSC_SEARCH
', 
			'value' => 'header      __HSC_SEARCH1  Subject =~ /be seen first on (google|msn|yahoo)|get ranked high|rank high|(no cost|free) website (analysis|search engine)/i
body     __HSC_SEARCH2  /search engine/i
body     __HSC_SEARCH3  /(first on|all of) the major search|not ranked number one/i
body     __HSC_SEARCH4  /guaranteed type of exposure|free website search engine optimi|increase your revenue|improve your website traffice/i
rawbody     __HSC_SEARCH5   /Click2Call|a1-solutions|fast-response.net|action-pros.net|tops-1.com/i
meta     HSC_SEARCH  (__HSC_SEARCH1 + __HSC_SEARCH2 + __HSC_SEARCH3 + __HSC_SEARCH4 + __HSC_SEARCH5 >= 4)
describe HSC_SEARCH  Spammers hawking SEO
score    HSC_SEARCH  5.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '123', 
			'type' => 'meta', 
			'name' => '__HSC_SEO
', 
			'value' => 'header      __HSC_SEO1  Subject =~ /Idea for \[/i
body     __HSC_SEO2  /first page of (Google|MSN|Yahoo)/i
body     __HSC_SEO3  /never find your web site/i
body     __HSC_SEO4  /No upfront fees/i
body     __HSC_SEO5  /more traffic guaranteed/i
body     __HSC_SEO6  /will not get your website banned/i
meta     HSC_SEO     (__HSC_SEO1 + __HSC_SEO2 + __HSC_SEO3 + __HSC_SEO4 + __HSC_SEO5 + __HSC_SEO6 >= 5)
describe HSC_SEO     Spammers hawking SEO
score    HSC_SEO     2.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '124', 
			'type' => 'meta', 
			'name' => '__HSC_SOFTWARE
', 
			'value' => 'header      __HSC_SOFTWARE1      Subject =~ /fix Windows File Errors/i
header      __HSC_SOFTWARE2      From =~ /registry/i
body     __HSC_SOFTWARE3      /Fix file errors/i
body     __HSC_SOFTWARE4      /download for no cost|FREE Software|Free Analysis|Free Report/i
meta     HSC_SOFTWARE   (__HSC_SOFTWARE1 + __HSC_SOFTWARE2 + __HSC_SOFTWARE3 + __HSC_SOFTWARE4 >= 4)
describe HSC_SOFTWARE   Spammers hawking Software products
score    HSC_SOFTWARE   5.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '125', 
			'type' => 'meta', 
			'name' => '__HSC_NIGERIAN
', 
			'value' => 'header      __HSC_NIGERIAN2_1 Subject =~ /high court|contact fedex courier|WIRE TRANSFER/i
body     __HSC_NIGERIAN2_2 /barrister|director of central bank|bank director/i
body     __HSC_NIGERIAN2_3 /high court|central bank|payment center/i
body     __HSC_NIGERIAN2_4 /e-?mail id is found among those that have been scammed|paid the fee for your cheque draft|contact the bank director/i
body     __HSC_NIGERIAN2_5 /fund code|cheque|bank draft/i
body     __HSC_NIGERIAN2_6 /full contact information requested|need your contacts informations|your bank account information/i
body     __HSC_NIGERIAN2_7 /bank/i
body     __HSC_NIGERIAN2_8 /courier|diplomat agent|direct wire transfer/i
body     __HSC_NIGERIAN2_9 /scam|don't let them know that it is money|bank transfer charges/i
meta     HSC_NIGERIAN2     (__HSC_REFI4 + __HSC_NIGERIAN2_1 + __HSC_NIGERIAN2_2 + __HSC_NIGERIAN2_3 + __HSC_NIGERIAN2_4 + __HSC_NIGERIAN2_5 + __HSC_NIGERIAN2_6 + __HSC_NIGERIAN2_7 + __HSC_NIGERIAN2_8 + __HSC_NIGERIAN2_9 >= 8)
describe HSC_NIGERIAN2     Yet more Nigerian scams. Some even explaining the scam.
score    HSC_NIGERIAN2     5.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '126', 
			'type' => 'meta', 
			'name' => '__HSC_MEDICAL
', 
			'value' => 'body     __HSC_MEDICAL1    /million who suffer from|suffered from organ failure/i
body     __HSC_MEDICAL2    /Safe - Natural - Effective/i
body     __HSC_MEDICAL3    /Free \d+ day trial/i
body     __HSC_TINNI1      /TinniFix/i
body     __HSC_TINNI2      /Stop the ringing in your ears/i
header      __HSC_TINNI3      Subject =~ /(ringing|buzz) in your ears/i
meta     HSC_TINNI      (__HSC_MEDICAL1 + __HSC_MEDICAL2 + __HSC_MEDICAL3 + __HSC_TINNI1 + __HSC_TINNI2 + __HSC_TINNI3 >= 5)
describe HSC_TINNI      Another Medical Scam
score    HSC_TINNI      5.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '127', 
			'type' => 'meta', 
			'name' => '__HSC_GIVE
', 
			'value' => 'body     __HSC_GIVE1    /receive your gift/i
body     __HSC_GIVE2    /laptop giveaway|deliver your dell.? laptop/i
body     __HSC_GIVE3    /answering a short survey/i
body     __HSC_GIVE4    /verify your shipping address/i
meta     HSC_GIVE    (__HSC_GIVE1 + __HSC_GIVE2 + __HSC_GIVE3 + __HSC_GIVE4 >= 4)
describe HSC_GIVE    Free stuff "giveaway" scam
score    HSC_GIVE    4.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '128', 
			'type' => 'meta', 
			'name' => '__HSC_GOVT
', 
			'value' => 'header      __HSC_GOVT1    Subject =~ /Government Funding/i
body     __HSC_GOVT2    /government funding/i
body     __HSC_GOVT3    /complimentary information kit/i
body     __HSC_GOVT4    /No.Money?.{0,4}No.Problem/i
meta     HSC_GOVT    (__HSC_GOVT1 + __HSC_GOVT2 + __HSC_GOVT3 + __HSC_GOVT4 >= 4)
describe HSC_GOVT    Your tax dollars at work scam...
score    HSC_GOVT    4.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '129', 
			'type' => 'meta', 
			'name' => '__HSC_CNN
', 
			'value' => 'header      __HSC_CNN1  Subject =~ /CNN.com Daily Top/i
meta     HSC_CNN     (__HSC_CNN1 == 1)
describe HSC_CNN     CNN Daily Top 10 Link Obfuscation spams
score    HSC_CNN     2.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '130', 
			'type' => 'meta', 
			'name' => '__HSC_GOOGLE
', 
			'value' => 'header          __HSC_GOOGLE1            Subject =~ /Learn Google|Google Starter Kit|with Google|Use Google|Google Work|google millionaire|Google Business|Google Pro Sucess|with my Google|Google Home Business|Google ATM|One Hour On Google|Free Money Making|make a fortune on ?line/i
body            __HSC_GOOGLE2            /learn how to earn|automated income kit|online from home|as much money as you wish|be the boss/i
body            __HSC_GOOGLE3            /tons of money|making \$[\d,]*s with Google|extra cash|making serious money/i
body     __HSC_GOOGLE4      /with Google|Google Pie|Google Cash/i
header      __HSC_GOOGLE5      From =~ /Google Money/i
meta            HSC_GOOGLE               (__HSC_GOOGLE1 + __HSC_GOOGLE2 + __HSC_GOOGLE3 + __HSC_GOOGLE4 + __HSC_GOOGLE5 >= 3)
describe        HSC_GOOGLE               Google Pyramid Scams
score           HSC_GOOGLE               3.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '131', 
			'type' => 'meta', 
			'name' => '__HSC_ALARM
', 
			'value' => 'header          __HSC_ALARM1            Subject =~ /Free Alarm Quotes/i
body            __HSC_ALARM2            /free Quotes/i
body            __HSC_ALARM3            /Burglaries/i
meta            HSC_ALARM               (__HSC_ALARM1 + __HSC_ALARM2 + __HSC_ALARM3 >= 3)
describe        HSC_ALARM               Security and Alarm Company Spams
score           HSC_ALARM               3.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '132', 
			'type' => 'meta', 
			'name' => '__HSC_SELL
', 
			'value' => 'header          __HSC_SELL1            Subject =~ /Market Credit Cards/i
body            __HSC_SELL2            /Easy Money/i
body            __HSC_SELL3            /Selling Credit Cards/i
meta            HSC_SELL               (__HSC_SELL1 + __HSC_SELL2 + __HSC_SELL3 >= 3)
describe        HSC_SELL               Selling Cards Marketing Scams
score           HSC_SELL               3.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '133', 
			'type' => 'meta', 
			'name' => '__HSC_URONLINE
', 
			'value' => 'body     __HSC_URONLINE1      /(chat|chat with me|hook ?up) on Y ?A ?H ?O ?O (tonight|or MSN)|add me with yahoo or msn|view now|press this web link/i
body     __HSC_URONLINE2      /wanna talk|ur info|found your mail|found ur profile|mutual friend|katya from russia|you came to russia|my gentle sun|see this page I made|match making heaven|meet that special|comee see it over here/i
body     __HSC_URONLINE3      /get (naked|naughty)|horny|naughty toys|I will do anything|TOTALLY msg me on MSN|tell me your mobile|I remember you|let's talk|ran across someone like u|sexywebdating|chatting with someone|saw you by BJs/i
header          __HSC_URONLINE4     Subject =~ /i'?m so ho?rny|ur really cute|flirt with u|get the party|lets hookup|MSN messanger|\d\d y.o.|russian soul-?mate|my handsome|want you now|russian girl|costs you nothing|can you feel this|came to russia|I remember you|sexual Russia|take a look/i
meta     HSC_URONLINE      (__HSC_URONLINE1 + __HSC_URONLINE2 + __HSC_URONLINE3 + __HSC_URONLINE4 >= 3)
describe HSC_URONLINE      Chat Scams
score    HSC_URONLINE      2.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '134', 
			'type' => 'meta', 
			'name' => '__HSC_HTML
', 
			'value' => 'rawbody     __HSC_HTML1 /Please enable image viewing in order to view this message/is
header      __HSC_RAT1  From =~ /\@fromname\@/i
header      __HSC_RAT2  Subject =~ /\[FName\]/i
meta     HSC_RAT     (__HSC_RAT1 + __HSC_RAT2 >= 1)
describe HSC_RAT     Variable Replacements Indicative of RatWare/Mass Mailing
score    HSC_RAT     5.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '135', 
			'type' => 'meta', 
			'name' => '__HSC_SEX
', 
			'value' => 'body     __HSC_SEX04_1  /(curative|medicinal|salutary|wholesome|beneficial|satisfaction) effect|(first-rated|splendid) drugs|(yellow|blue|famos) (tablet|pill)|good medical supplies|(commendable|valuable) medicines|canadian pharmacy/is
body     __HSC_SEX04_2  /fun in bed|(bed|night) adventures|aid your bed|(lift|heave|ascent|hoist|raise|boost|aid) your (belove|love|darling|sex|sweet)|sexuality with assistance|ascent your sweet|bed experience|love sexuality/is
header      __HSC_SEX04_3  Subject =~ /your manhood|(bed|night) adventures|sexual experience|empower your (belove|sex)|sweet sex|bed (event|experience)|lover sexuality|(lift|heave|ascent|hoist|raise|boost|aid) your (belove|love|darling|sex|sweet)|discounted drugs/i
body     __HSC_SEX04_4   /longer your tool|sexual experience|empower your (belove|sex)|sweet sex|(not bad|great|nice|special|awesome|free) bonus|sex all night|lovers package/is
meta     HSC_SEX04   (__HSC_SEX04_1 + __HSC_SEX04_2 + __HSC_SEX04_3 + __HSC_SEX04_4 >= 3)
describe HSC_SEX04   Sexually Explicit SPAM
score    HSC_SEX04   3.0
meta            HSC_SEX04_2       (__HSC_SEX04_1 + __HSC_SEX04_2 + __HSC_SEX04_3 + __HSC_SEX04_4 >= 2 && (HSC_SEX04 < 1))
describe        HSC_SEX04_2       Likely Sexually Explicit SPAM
score           HSC_SEX04_2       2.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '136', 
			'type' => 'meta', 
			'name' => '__HSC_SEX
', 
			'value' => 'header      __HSC_SEX05_1  Subject =~ /upgrade your virility|become a man|bigger instrument|admire your stick|enlarge your member|you have a tiny tool|with more inches|your mega size|improve your love/i
body     __HSC_SEX05_2  /buy rubber friends|big bait in your pants|she sees your size|women will be funk|biggest tool|immense monster|women will be daydreaming|have so much meat|prolonging your size|last a lot longer/i
meta     HSC_SEX05   (__HSC_SEX05_1 + __HSC_SEX05_2 >= 2)
describe HSC_SEX05   Sexually Explicit SPAM
score    HSC_SEX05   2.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '137', 
			'type' => 'meta', 
			'name' => '__HSC_FOOTBALL
', 
			'value' => 'header      __HSC_FOOTBALL1      Subject =~ /Amateur Club|Seeks? Player/i
header      __HSC_FOOTBALL2      From =~ /Football/i
body     __HSC_FOOTBALL3      /Mercato/i
body     __HSC_FOOTBALL4      /Football/i
meta     HSC_FOOTBALL   (__HSC_FOOTBALL1 + __HSC_FOOTBALL2 + __HSC_FOOTBALL3 + __HSC_FOOTBALL4 >= 4)
describe HSC_FOOTBALL   Spammy Football Club
score    HSC_FOOTBALL   4.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '138', 
			'type' => 'meta', 
			'name' => '__HSC_DISH
', 
			'value' => 'header      __HSC_DISH1 From =~ /Dish Network|TVUpgrade|Satellite HD/i
header      __HSC_DISH2 Subject =~ /Free Next Day Install|Free HD Receiver|Free HBO|free w\/Dish/i
body     __HSC_DISH3 /American Satellite Providers/i
meta     HSC_DISH (__HSC_DISH1 + __HSC_DISH2 + __HSC_DISH3 >=3)
describe HSC_DISH Dish Network Spams
score    HSC_DISH 3.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '139', 
			'type' => 'meta', 
			'name' => '__HSC_IDENTNET
', 
			'value' => 'header      __HSC_IDENTNET1      From =~ /\@identitynetwork.net/i
body     __HSC_IDENTNET2      /ADVERTISE WITH IDENTITY NETWORK/i
meta     HSC_IDENTNET   (__HSC_IDENTNET1 + __HSC_IDENTNET2 >=2)
describe HSC_IDENTNET   Identity Network Spams
score    HSC_IDENTNET   4.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '140', 
			'type' => 'meta', 
			'name' => '__HSC_HONEY
', 
			'value' => 'body     __HSC_HONEY1   /Intacct Corporation|Miles Technologies|EcoPhones|businessbrief\.com|pbpinfo\.com|pbp-executivereports\.net|b21pubs\.com|sonar6\.com|cheetahsend\.com|voip-news|microcappress.com|myrtlebeachnow|sosonlinebackup.com/i
header      __HSC_HONEY2   From =~ /\@intacct\.com|\@milestechnologies\.com|\@greenschoolfundraiser\.org|\@business-brief\.(net|com)|\@b21pubs\.com|\@pbp-executivereports\.net|\@sonar6\.com|\@cheetahsend\.com|\@ripple.us.com|\@voip-news\.com|\@.{0,8}.microcappress.com|\@BetterBuysReports.com|\@MyrtleBeachNow.com|\@sosonlinebackup.com/i
meta     HSC_HONEY   (__HSC_HONEY1 + __HSC_HONEY2 >= 2)
describe HSC_HONEY   Spammer sending to a honeypot or known spammer through other means
score    HSC_HONEY   4.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '141', 
			'type' => 'meta', 
			'name' => '__HSC_DUCHESS
', 
			'value' => 'header      __HSC_DUCHESS1 Received =~ /mediaduchessstore.info|mediaduchesslive.info|mymediaduchess.info|mediaduchessonline.info|mytvduchess.info|mediaduchesspro.info|mileshop.info|freegrampro.info|radioduchess.info|acreforyou.info|mileblog.info/i
header      __HSC_DUCHESS2 From =~ /mediaduchessstore.info|mediaduchesslive.info|mymediaduchess.info|mediaduchessonline.info|mytvduchess.info|mediaduchesspro.info|mileshop.info|freegrampro.info|radioduchess.info|acreforyou.info|mileblog.info/i
body     __HSC_DUCHESS3 /Mr. Media Group|BLM Marketing Services|4801 l[yi]nton b/i
rawbody     __HSC_DUCHESS4 /duchess/i
rawbody     __HSC_DUCHESS5 /http:\/\/.{4,30}\.info\/[A-Za-z]{30}("|\/)/i
body     __HSC_DUCHESS6 /For account number:/i
meta     HSC_DUCHESS ((__HSC_DUCHESS1 + __HSC_DUCHESS2 >= 1) + __HSC_DUCHESS3 + __HSC_DUCHESS4 + __HSC_DUCHESS5 + __HSC_DUCHESS6 >= 4)
describe HSC_DUCHESS Spammer sending emails using a variety of domains and linked images
score    HSC_DUCHESS 5.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '142', 
			'type' => 'meta', 
			'name' => '__HSC_UPS
', 
			'value' => 'header      __HSC_UPS1  Subject =~ /UPS Delivery problem/i
header      __HSC_UPS2  From !~ /\@ups\.com[ |>]/i
body     __HSC_UPS3  /invoice copy attached/i
meta     HSC_UPS     (__HSC_UPS1 + __HSC_UPS2 + __HSC_UPS3 >=3)
describe HSC_UPS     UPS doesn't send invoices with delivery problem notes
score    HSC_UPS     6.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '143', 
			'type' => 'meta', 
			'name' => '__HSC_SKYPE
', 
			'value' => 'header      __HSC_SKYPE1   Subject =~ /Free Calls/i
header      __HSC_SKYPE2   Received =~ /releasesourcek.com/i
header      __HSC_SKYPE3   From =~ /VOIP News/i
body     __HSC_SKYPE4   /Promo Code: \d/i
meta     HSC_SKYPE   (__HSC_SKYPE1 + __HSC_SKYPE2 + __HSC_SKYPE3 + __HSC_SKYPE4 >=3)
describe HSC_SKYPE   Skype/Voip scams likely to spread malware
score    HSC_SKYPE   5.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '144', 
			'type' => 'meta', 
			'name' => '__HSC_DRUG
', 
			'value' => 'header      __HSC_DRUG2_1  Subject =~ /Viagra|male enhanc|easier time making her|hot infatuations|bed tempera?ment|resigned slaves|prick be soft|increased performance|guys in bed|bedroom fun|love more passion|cure ED|(bed|sex) games|spices? (it up in|to the) bed|(bedroom|nights of) pleasure|ladies love|stay hard|satis?fy (your spouse|her)|(problems|strong|help|good) (in|for) bed|bedtime enhanc|p[0o]rn ?star|blue ?pill|great sex|please your gf|(help in the|king of the|great time in|strong night in|performance in|advice for the) bed|intimate life|gain 3\+? inches|sexual (excitement|anxiety|act)|love tool|sexual treatment|make love|make your girl happ|completely impotent/i
header      __HSC_DRUG2_2  Subject =~ /ambien|Percocet|vicod[i1]n|Meridia|look slim|Phentermin|adderall|codeine|Hydrocodone|Phetermin|oxycodone|no prescription need|(help|trouble) falling asleep|overpriced pharmacy|prescript.medz|Xanx?ax|RxMed|your.rx.meds|fill your meds|pharmacy offers|international pharm|(loved|preferred|favor[ite]{3}) (rx)?med|pain killer|Medi?cati[o0]ns|canadianrx|weightl0ss|no ?prescription|weight l0ss|l0seweight|ritalin|look great/i
body     __HSC_DRUG2_3  /Medi?cati[o0]ns|desired meds|favou?red (rx)?med|buy remedies|drug store|medicants|medicaments|sexual stim|sex stim|pain killer|(purchase|loved|preferred|favou?rite) (?:rx.?)?(deal|med)[sz]|rx.?Meds?.?deal|buy your meds|choice of meds|Rx.?(deal|Med|Sale)|v[i1]agra|medz.special|loved meds|(rx|medication) ?discount/i
body            __HSC_DRUG2_4   /Purchase|grab hold|click here|at[_ ~]your[_ ~]finger[_ ~]?tip|placing your order|questions about drugs|prescription is not|don't care about prescription|without a doctor|no need for a doctor|affor[df]able.prices|best daily rx|Fav.Prescript|unmatched.prices|rx.med/i
body            __HSC_DRUG2_5   /0nline|hassle[~-]free|favored rx|branded solutions|branded remedies|v[1i]cod[!i]n|Penhtremine|prxpills|ultimaterxhere|insanerx|speedymed4u|mightymeds1|coolestrxhere|hotrxmedspot|topshoprx|mightyrxhere|qualityrxmedz|legitrxlife|dealsformeds|simplyrxdeals|bestrxlight|ezprescriptz|reliablerxsource1|freetrusted-rx|hotmedsourcehere|CabinetOfMeds|mytrusted-rx|RxwarehouseHere|WarehouseofRxMeds|GreatrxMedsRus|rxmedsrus|(come by|Come to|Check Out) our web site|browse [0o]ur (website|selection)|Visit_0ur Web|Order_Now|available_this week|(buy|order) (n[0o]w|today|right.now|instantly|at [0o]nce|immediately)|check it out today|ord3r|0rder|0rd3r|browseour|rx ?unit/i
body     __HSC_DRUG2_6  /(Express|Prompt|Day|Trusty|Trustworthy|Reliable|fast|true|discreet|confidential|rapid)[_ ~\.]?Shippin|anonymous packing|shipped.right.away/i
header      __HSC_DRUG2_7  Subject =~ / {4}[a-z0-9]{2,4}$/i
meta     HSC_DRUG2   ( __HSC_DRUG2_1 +  __HSC_DRUG2_2 +  __HSC_DRUG2_3 +  __HSC_DRUG2_4 +  __HSC_DRUG2_5 + __HSC_DRUG2_6 + __HSC_DRUG2_7 >= 3)
describe HSC_DRUG2   More online Drug Scams
score    HSC_DRUG2   3.5
meta            HSC_DRUG2_2     ( __HSC_DRUG2_1 +  __HSC_DRUG2_2 +  __HSC_DRUG2_3 +  __HSC_DRUG2_4 +  __HSC_DRUG2_5 + __HSC_DRUG2_6 + __HSC_DRUG2_7 >= 5)
describe HSC_DRUG2_2 Higher Certainty of Drug Scam
score    HSC_DRUG2_2 3.0
meta     HSC_SEXSUBJECT __HSC_DRUG2_1
describe HSC_SEXSUBJECT Sexually Explicit Subject
score    HSC_SEXSUBJECT  2.0

', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '145', 
			'type' => 'meta', 
			'name' => '__HSC_FLASH
', 
			'value' => 'body     __HSC_FLASH1   /Flash Player Code: \d\d/i
body     __HSC_FLASH2   /Flash Player Update/i
header      __HSC_FLASH3   Subject =~ /Flash Player/i
header      __HSC_FLASH4   Subject =~ /activation code/i
header      __HSC_FLASH5   From =~ /Flash Player/i
meta     HSC_FLASH   (__HSC_FLASH1 + __HSC_FLASH2 + __HSC_FLASH3 + __HSC_FLASH4 + __HSC_FLASH5 >= 3)
describe HSC_FLASH   Fake Flash Player Phishing Scam
score    HSC_FLASH   4.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '146', 
			'type' => 'meta', 
			'name' => '__HSC_ADWORD
', 
			'value' => 'body     __HSC_ADWORD1  /(Advertisement|Adwords) Campaign/i
header      __HSC_ADWORD2  From =~ /adwords.com|salesdirect.com/i
header      __HSC_ADWORD3  Subject =~ /adwords campaign|ads in adwords/i
body     __HSC_ADWORD4  /adwords\.php|index\.php\?isgoogle/i
meta     HSC_ADWORD  (__HSC_ADWORD1 + __HSC_ADWORD2 + __HSC_ADWORD3  + __HSC_ADWORD4 >= 3) + (HSC_RPTR_SUSPECT + HSC_RPTR_FAILED >= 1) >= 2
describe HSC_ADWORD  Fake Adword Campaign notices
score    HSC_ADWORD  3.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '147', 
			'type' => 'meta', 
			'name' => '__HSC_GINA
', 
			'value' => 'header      __HSC_GINA1 From =~ /GINA deadline|GINA Update|compliance/i
header      __HSC_GINA2 Subject =~ /GINA deadline/i
body     __HSC_GINA3 /Genetic Information Nondiscrimination Act/i
body     __HSC_GINA4 /mandatory poster|remain in compliance|GINA regulations/i
meta            HSC_GINA   (__HSC_GINA1 + __HSC_GINA2 + __HSC_GINA3 + __HSC_GINA4 + __HSC_REFI4  >= 4)
describe HSC_GINA Employment Poster Marketing Spams
score    HSC_GINA 3.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '148', 
			'type' => 'meta', 
			'name' => '__HSC_TAX
', 
			'value' => 'header      __HSC_TAX1  Subject =~ /Free (IRS )?Tax Filing|Tax Filing Exten[st]ion|taxes online/i
header      __HSC_TAX2  From =~ /tax|HRBlock|marketing/i
body     __HSC_TAX3  /File your taxes for free|need more time/i
meta     HSC_TAX     (__HSC_TAX1 + __HSC_TAX2 + __HSC_TAX3 >=3)
describe HSC_TAX     Tax Filing Scams
score    HSC_TAX     2.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '149', 
			'type' => 'meta', 
			'name' => '__HSC_CASINO
', 
			'value' => 'body     __HSC_CASINO1  /Elite World Casino/i
body     __HSC_CASINO2  /Online Casino/i
header      __HSC_CASINO3  Subject =~ /chances to win/i
meta     HSC_CASINO  (__HSC_CASINO1 + __HSC_CASINO2 + __HSC_CASINO3 >= 3)
describe HSC_CASINO  Online Casino Spam
score    HSC_CASINO  3.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '150', 
			'type' => 'meta', 
			'name' => '__HSC_TWIT
', 
			'value' => 'header      __HSC_TWIT1 From =~ /twitter/i
header      __HSC_TWIT2 Subject =~ /twitter \d{3}-\d{2}/i
meta     HSC_TWIT (__HSC_TWIT1 + __HSC_TWIT2 + HSC_THEBAT >= 3)
describe HSC_TWIT Twitter bogus phishing emails
score    HSC_TWIT 2.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '151', 
			'type' => 'meta', 
			'name' => '__HSC_FACE
', 
			'value' => 'header          __HSC_FACE1     From =~ /password/i
header          __HSC_FACE2     Subject =~ /reset your facebook/i
header      __HSC_FACE3 X-Mailer =~ /Zuckmail/i
meta            HSC_FACE        (__HSC_FACE1 + __HSC_FACE2 + __HSC_FACE3 >= 3)
describe        HSC_FACE        Facebook bogus phishing emails
score           HSC_FACE        4.0
header      __HSC_PHISH3_1 Subject =~ /account notification/i
body     __HSC_PHISH3_2 /accessed by someone else./
meta     HSC_PHISH3  (__HSC_PHISH3_1 + __HSC_PHISH3_2 + __HSC_CLICK >= 3)
describe HSC_PHISH3  Phishing emails for account notification
score    HSC_PHISH3  4.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '152', 
			'type' => 'header', 
			'name' => 'HSC_BR_KNOWN_MAILER
', 
			'value' => 'header HSC_BR_KNOWN_MAILER X-Mailer =~ /phpmailer/i
describe HSC_BR_KNOWN_MAILER X-Mailer conhecido
score HSC_BR_KNOWN_MAILER 1.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '153', 
			'type' => 'header', 
			'name' => 'HSC_BR_MALFORMED_FROM_
', 
			'value' => 'header HSC_BR_MALFORMED_FROM_1 From =~ /s >/
describe HSC_BR_MALFORMED_FROM_1 From com formatacao errada
score HSC_BR_MALFORMED_FROM_1 0.5
', 
			'created_at' => '2011-03-24 11:29:07', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '154', 
			'type' => 'header', 
			'name' => 'HSC_BR_MALFORMED_FROM_
', 
			'value' => 'header HSC_BR_MALFORMED_FROM_2 From =~ /<[^>] $/
describe HSC_BR_MALFORMED_FROM_2 From com formatacao errada
score HSC_BR_MALFORMED_FROM_2 0.5
', 
			'created_at' => '2011-03-24 11:29:25', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '155', 
			'type' => 'header', 
			'name' => 'HSC_BR_MALFORMED_FROM_
', 
			'value' => 'header HSC_BR_MALFORMED_FROM_3 From =~ /<[^s] s[^>] >/
describe HSC_BR_MALFORMED_FROM_3 From com formatacao errada
score HSC_BR_MALFORMED_FROM_3 0.5
', 
			'created_at' => '2011-03-24 11:29:38', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '156', 
			'type' => 'rowbody', 
			'name' => 'HSC_BR_MAILTO_KEYS
', 
			'value' => 'rawbody HSC_BR_MAILTO_KEYS /mailto:S*(?:cadastro|curso|promo|remov|sexo|gostosa|oportunidade|renda)S*@(?:bol|ig).com.br/i
describe HSC_BR_MAILTO_KEYS Mailto para um endereco suspeito
score HSC_BR_MAILTO_KEYS 0.8
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '157', 
			'type' => 'body', 
			'name' => 'HSC_BR_COPYRIGHT
', 
			'value' => 'body HSC_BR_COPYRIGHT /todoss+oss+direitoss+reservados/i
describe HSC_BR_COPYRIGHT Todos os direitos reservados
score HSC_BR_COPYRIGHT 0.3
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '158', 
			'type' => 'header', 
			'name' => 'HSC_BR_HOAX_SUBJ
', 
			'value' => 'header HSC_BR_HOAX_SUBJ Subject =~ /chamada.*xbina|big.{0,3}brother.{0,3}bra[zs]il/i
describe HSC_BR_HOAX_SUBJ Hoax conhecidos no Subject
score HSC_BR_HOAX_SUBJ 2.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '159', 
			'type' => 'body', 
			'name' => 'HSC_BR_SIGILO_ABSOLUTO
', 
			'value' => 'body HSC_BR_SIGILO_ABSOLUTO /si[gj]ilos+absoluto/i
describe HSC_BR_SIGILO_ABSOLUTO Sigilo Absoluto
score HSC_BR_SIGILO_ABSOLUTO 0.2
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '160', 
			'type' => 'body', 
			'name' => 'HSC_BR_DUVIDAS_CONJUGAIS
', 
			'value' => 'body HSC_BR_DUVIDAS_CONJUGAIS /d.{1,3}vidass+conjugais/i
describe HSC_BR_DUVIDAS_CONJUGAIS Duvidas Conjugais
score HSC_BR_DUVIDAS_CONJUGAIS 0.2
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '161', 
			'type' => 'body', 
			'name' => 'HSC_BR_GRAVADOR_TELEFONICO
', 
			'value' => 'body HSC_BR_GRAVADOR_TELEFONICO /(?:gravador|grampo)W+telef.{1,3}n(?:ico|e)/i
describe HSC_BR_GRAVADOR_TELEFONICO Grampo?
score HSC_BR_GRAVADOR_TELEFONICO 0.2
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '162', 
			'type' => 'uri', 
			'name' => 'HSC_BR_REDEBIZ
', 
			'value' => 'uri HSC_BR_REDEBIZ /redebiz.com.br/i
describe HSC_BR_REDEBIZ Redebiz.com.br
score HSC_BR_REDEBIZ 2.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '163', 
			'type' => 'body', 
			'name' => 'HSC_BR_TENHA_SEU_SITE
', 
			'value' => 'body HSC_BR_TENHA_SEU_SITE /tenha seu site na internet/i
describe HSC_BR_TENHA_SEU_SITE Tenha seu site na Internet
score HSC_BR_TENHA_SEU_SITE 1.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '164', 
			'type' => 'body', 
			'name' => 'HSC_BR_ENVIOU_1REAL', 
			'value' => 'body HSC_BR_ENVIOU_1REAL /(?:mand|envi)(?:e|ou|aram|ar.{1,3}o)s (?:imediatamentes*)?r$s*1[,.]00b/i
describe HSC_BR_ENVIOU_1REAL Enviou R$1,0
score HSC_BR_ENVIOU_1REAL 0.5
', 
			'created_at' => '2011-02-01 12:49:27', 
			'updated_at' => '2011-02-01 12:49:27', 
			'deleted_at' => '2018-03-26 19:33:12', 
            ],
            [
			'id' => '165', 
			'type' => 'body', 
			'name' => 'HSC_BR_GANHE_ENVIANDO
', 
			'value' => 'body HSC_BR_GANHE_ENVIANDO /ganhe dinheiro.{0,20}enviando e-*mail/i
describe HSC_BR_GANHE_ENVIANDO Ganhe dinheiro enviando e-mails
score HSC_BR_GANHE_ENVIANDO 1.9
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '166', 
			'type' => 'body', 
			'name' => 'HSC_BR_INCLUIR_PIRAMIDE
', 
			'value' => 'body HSC_BR_INCLUIR_PIRAMIDE /meu nome.{0,10}inclu.{1,3}do.{0,15}sua lista de correspond.{1,3}ncia/i
describe HSC_BR_INCLUIR_PIRAMIDE Incluir meu nome na piramide
score HSC_BR_INCLUIR_PIRAMIDE 1.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '167', 
			'type' => 'body', 
			'name' => 'HSC_BR_TRABALHE_EM_CASA
', 
			'value' => 'body HSC_BR_TRABALHE_EM_CASA /trabalhe (?:a partir )?(?:de|em) casa/i
describe HSC_BR_TRABALHE_EM_CASA Trabalhe em casa
score HSC_BR_TRABALHE_EM_CASA 1.3
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '168', 
			'type' => 'body', 
			'name' => 'HSC_BR_MEPPS
', 
			'value' => 'body HSC_BR_MEPPS /bM.*E.*P.*P.*S.*b/i
describe HSC_BR_MEPPS MEPPS
score HSC_BR_MEPPS 1.3
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '169', 
			'type' => 'body', 
			'name' => 'HSC_BR_MEPPS_SUBJ
', 
			'value' => 'header HSC_BR_MEPPS_SUBJ Subject =~ /bM.*E.*P.*P.*S.*b/i
describe HSC_BR_MEPPS_SUBJ MEPPS no subject
score HSC_BR_MEPPS_SUBJ 2.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '170', 
			'type' => 'body', 
			'name' => 'HSC_BR_RETIRAR_EMAIL
', 
			'value' => 'body HSC_BR_RETIRAR_EMAIL /paraW+(?:retirar|remover)W+seuW+e-*mail/i
describe HSC_BR_RETIRAR_EMAIL Para retirar seu e-mail da lista
score HSC_BR_RETIRAR_EMAIL 0.4
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '171', 
			'type' => 'body', 
			'name' => 'HSC_BR_DIVULGUE_SUA
', 
			'value' => 'body HSC_BR_DIVULGUE_SUA /divulgues+(?:sua|seu)/i
describe HSC_BR_DIVULGUE_SUA Divulgue sua/seu
score HSC_BR_DIVULGUE_SUA 0.3
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '172', 
			'type' => 'body', 
			'name' => 'HSC_BR_PERDER_TEMPO
', 
			'value' => 'body HSC_BR_PERDER_TEMPO /percas+(?:mais){0,1}s*tempo/i
describe HSC_BR_PERDER_TEMPO Fala sobre nao perder tempo
score HSC_BR_PERDER_TEMPO 0.3
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '173', 
			'type' => 'body', 
			'name' => 'HSC_BR_
', 
			'value' => 'body HSC_BR_24_HORAS /b24s*(?:horas|h|hr|hrs)b/i
describe HSC_BR_24_HORAS 24 Horas
score HSC_BR_24_HORAS 0.1
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '174', 
			'type' => 'body', 
			'name' => 'HSC_BR_SUA_EMPRESA
', 
			'value' => 'body HSC_BR_SUA_EMPRESA /b(?:de|para)s+suas+empresab/i
describe HSC_BR_SUA_EMPRESA Contem 'de/para sua empresa'
score HSC_BR_SUA_EMPRESA 0.6
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '175', 
			'type' => 'body', 
			'name' => 'HSC_BR_HOSPEDAGEM
', 
			'value' => 'body HSC_BR_HOSPEDAGEM /bhospedagemb/i
describe HSC_BR_HOSPEDAGEM Contem a palavra 'hospedagem'
score HSC_BR_HOSPEDAGEM 0.1
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '176', 
			'type' => 'body', 
			'name' => 'HSC_BR_AUMENTE_PENIS
', 
			'value' => 'body HSC_BR_AUMENTE_PENIS /aument[ae]s+(?:seu){0,1}s*p(?:e|ê|�?|&ecirc;)nis/i
describe HSC_BR_AUMENTE_PENIS Fala sobre aumento de penis
score HSC_BR_AUMENTE_PENIS 2.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '177', 
			'type' => 'header', 
			'name' => 'HSC_BR_HOSPEDAGEM_SUBJ
', 
			'value' => 'score HSC_BR_HOSPEDAGEM_SUBJ 0.5
header HSC_BR_HOSPEDAGEM_SUBJ Subject =~ /bhospedagemb/i
describe HSC_BR_HOSPEDAGEM_SUBJ Contem a palavra 'hospedagem' no Subject
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '178', 
			'type' => 'body', 
			'name' => 'HSC_BR_E_CONFIRA
', 
			'value' => 'body HSC_BR_E_CONFIRA /bes+confira/i
describe HSC_BR_E_CONFIRA Texto 'e confira'
score HSC_BR_E_CONFIRA 0.2
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '179', 
			'type' => 'body', 
			'name' => 'HSC_BR_AGENCIA_DE_XXXX
', 
			'value' => 'body HSC_BR_AGENCIA_DE_XXXX /bAg(?:..|e|ê|�?|&ecirc;)ncias+des+(?:aproxima|modelo)/i
describe HSC_BR_AGENCIA_DE_XXXX Agencia de Aproximacao/Modelos
score HSC_BR_AGENCIA_DE_XXXX 0.4
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '180', 
			'type' => 'body', 
			'name' => 'HSC_BR_ESPECIALMENTE_VC', 
			'value' => 'body HSC_BR_ESPECIALMENTE_VC /bespecialmentes p(?:/|.|a{0,1}ra)s v(?:c|oc(?:.{1,2}|�))[s.!]/i
describe HSC_BR_ESPECIALMENTE_VC Especialmente para voce
score HSC_BR_ESPECIALMENTE_VC 0.8
', 
			'created_at' => '2011-02-01 12:49:13', 
			'updated_at' => '2011-02-01 12:49:13', 
			'deleted_at' => '2018-03-26 19:33:12', 
            ],
            [
			'id' => '181', 
			'type' => 'uri', 
			'name' => 'HSC_RULE_
', 
			'value' => 'uri HSC_RULE_0100 /santabrasil\.net/i
score HSC_RULE_0100  7.8', 
			'created_at' => '2011-03-15 14:11:01', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '182', 
			'type' => 'body', 
			'name' => 'HSC_BR_PERDER_PESO
', 
			'value' => 'body HSC_BR_PERDER_PESO /(?:precisa|quer)W+perderW+(?:peso|[d,.]s*(?:kg|kilos))/i
describe HSC_BR_PERDER_PESO Fala sobre perder peso
score HSC_BR_PERDER_PESO 0.8
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '183', 
			'type' => 'body', 
			'name' => 'HSC_BR_PERDER_PESO_
', 
			'value' => 'rawbody HSC_BR_PERDER_PESO_2 /percaW (?:peso|[d,.]s*(?:kg|kilos))/i
describe HSC_BR_PERDER_PESO_2 Fala sobre perder peso
score HSC_BR_PERDER_PESO_2 0.4
', 
			'created_at' => '2011-02-01 12:39:04', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '184', 
			'type' => 'body', 
			'name' => 'HSC_BR_DESCULPE
', 
			'value' => 'body HSC_BR_DESCULPE /desculpes+os+(?:inc(?:o|Î|�?|&ocirc;)modo|transtorno)/i
describe HSC_BR_DESCULPE Pede desculpas pelo incomodo/transtorno
score HSC_BR_DESCULPE 0.3
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '185', 
			'type' => 'body', 
			'name' => 'HSC_BR_CONSULTE
', 
			'value' => 'body HSC_BR_CONSULTE /bconsulte-*nosb/i
describe HSC_BR_CONSULTE Consulte-nos!
score HSC_BR_CONSULTE 0.1
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '186', 
			'type' => 'body', 
			'name' => 'HSC_BR_ESPIONAGEM
', 
			'value' => 'body HSC_BR_ESPIONAGEM /b(?:espionagem|detetive)b/i
describe HSC_BR_ESPIONAGEM Detetive ou Espionagem
score HSC_BR_ESPIONAGEM 0.1
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '187', 
			'type' => 'body', 
			'name' => 'HSC_BR_DESPACHO
', 
			'value' => 'body HSC_BR_DESPACHO /Despachamoss+paras+todos+os+Brasil/i
describe HSC_BR_DESPACHO Despachamos para todo o Brasil
score HSC_BR_DESPACHO 0.6
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '188', 
			'type' => 'body', 
			'name' => 'HSC_BR_EMAIL_COUNT
', 
			'value' => 'body HSC_BR_EMAIL_COUNT /(?:[d.]{7,}|d+s*milh.{0,3}(?:es|o))s+(?:des+)e-*mail['s]{0,2}b/i
describe HSC_BR_EMAIL_COUNT Provavelmente e' sobre venda de listas de e-mails
score HSC_BR_EMAIL_COUNT 1.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '189', 
			'type' => 'body', 
			'name' => 'HSC_BR_TELEMARKETING
', 
			'value' => 'body HSC_BR_TELEMARKETING /tele.{0,3}marketing/i
describe HSC_BR_TELEMARKETING Fala sobre 'Telemarketing'
score HSC_BR_TELEMARKETING 0.3
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '190', 
			'type' => 'body', 
			'name' => 'HSC_BR_TRABALHAR_CASA
', 
			'value' => 'body HSC_BR_TRABALHAR_CASA /trabalh(?:ar|e)s+(?:de|em)s+casab/i
describe HSC_BR_TRABALHAR_CASA Fala sobre 'Trabalhar em Casa'
score HSC_BR_TRABALHAR_CASA 0.7
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '191', 
			'type' => 'body', 
			'name' => 'HSC_BR_SAIBA_MAIS
', 
			'value' => 'body HSC_BR_SAIBA_MAIS /bsaibas+mais/i
score HSC_BR_SAIBA_MAIS 0.3
body HSC_BR_SAIBA_MAIS2 /bimperd(?:.{1,3}|&iacute;)velb/i
score HSC_BR_SAIBA_MAIS2 0.3
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '192', 
			'type' => 'body', 
			'name' => 'HSC_BR_VISITE
', 
			'value' => 'body HSC_BR_VISITE /visites+nossos+site/i
describe HSC_BR_VISITE Fala sobre 'Visite nosso site'
score HSC_BR_VISITE 0.3
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '193', 
			'type' => 'body', 
			'name' => 'HSC_BR_APROVEITE
', 
			'value' => 'body HSC_BR_APROVEITE /baproveitem?s+(?:nossa|es[st]a)s+promo/i
describe HSC_BR_APROVEITE Fala sobre 'Aproveite nossa promocao'
score HSC_BR_APROVEITE 0.8
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '194', 
			'type' => 'body', 
			'name' => 'HSC_BR_KEYWORD_JA
', 
			'value' => 'body HSC_BR_KEYWORD_JA /b(?:garanta|compre|ligue|adi*quira)s+.{0,10}s*(?:j(?:a|á|Á|&aacute;)|agora)b/i
describe HSC_BR_KEYWORD_JA XXXXX agora/ja
score HSC_BR_KEYWORD_JA 0.8
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '195', 
			'type' => 'body', 
			'name' => 'HSC_BR_CURSO_BODY
', 
			'value' => 'body HSC_BR_CURSO_BODY /bcurs[o0]s?b/i
describe HSC_BR_CURSO_BODY Curso no body
score HSC_BR_CURSO_BODY 0.1
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '196', 
			'type' => 'body', 
			'name' => 'HSC_BR_GRATIS
', 
			'value' => 'body HSC_BR_GRATIS /bgr.tisb/i
describe HSC_BR_GRATIS Inclui a palavra 'Gratis'
score HSC_BR_GRATIS 0.01
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '197', 
			'type' => 'body', 
			'name' => 'HSC_BR_FRETE_GRATIS
', 
			'value' => 'body HSC_BR_FRETE_GRATIS /bfretes+gr.tisb/i
describe HSC_BR_FRETE_GRATIS Inclui o texto 'Frete Gratis'
score HSC_BR_FRETE_GRATIS 0.4
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '198', 
			'type' => 'body', 
			'name' => 'HSC_BR_REMOVER_EMAIL
', 
			'value' => 'body HSC_BR_REMOVER_EMAIL /b(?:paras+){0,1}remover(?:s+(?:seu|os+seu)){0,1}s+e-*mailb/i
describe HSC_BR_REMOVER_EMAIL Inclui texto para remover email
score HSC_BR_REMOVER_EMAIL 1.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '199', 
			'type' => 'body', 
			'name' => 'HSC_BR_TEMPO_LIMITADO
', 
			'value' => 'body HSC_BR_TEMPO_LIMITADO /tempos+limitado/i
describe HSC_BR_TEMPO_LIMITADO Inclui a frase 'Tempo Limitado'
score HSC_BR_TEMPO_LIMITADO 0.8
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '200', 
			'type' => 'body', 
			'name' => 'HSC_BR_RENDA_EXTRA_BODY
', 
			'value' => 'body HSC_BR_RENDA_EXTRA_BODY /baument(e|ar|ou|ando)s+(?:as+sua|sua|os+seu|o|a){0,1}s+(?:renda|ganho)|(?:renda|ganho|dinheiro)[s-]+extrab/i
describe HSC_BR_RENDA_EXTRA_BODY Texto sobre 'Renda Extra'
score HSC_BR_RENDA_EXTRA_BODY 0.4
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '201', 
			'type' => 'body', 
			'name' => 'HSC_BR_UMA_VEZ
', 
			'value' => 'body HSC_BR_UMA_VEZ /estas+mensagems+(?:(?:s(?:o|ó|�?|&oacute;)s+){0,1}(?:vais+ser|ser(?:a|á|Á|&aacute;))|est(?:a|á|Á)ssendo|foi)s+enviada(?:sapenas){0,1}s+uma{0,1}(?:s+(?:u|ú|�?|&uacute;)nica)s+ve[zs]/i
describe HSC_BR_UMA_VEZ Dizendo que a msg sera enviada apenas uma vez
score HSC_BR_UMA_VEZ 1.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '202', 
			'type' => 'body', 
			'name' => 'HSC_BR_A_PARTIR_DE', 
			'value' => 'body HSC_BR_A_PARTIR_DE /bas*partirs des [a-z]{0,3}$s*[d.,] /i
describe HSC_BR_A_PARTIR_DE Texto 'A partir de $xx.xx'
score HSC_BR_A_PARTIR_DE 0.8
', 
			'created_at' => '2011-02-01 12:49:43', 
			'updated_at' => '2011-02-01 12:49:43', 
			'deleted_at' => '2018-03-26 19:33:12', 
            ],
            [
			'id' => '203', 
			'type' => 'body', 
			'name' => 'HSC_BR_WWW_SUAEMPRESA
', 
			'value' => 'body HSC_BR_WWW_SUAEMPRESA /.(?:(?:sua-*){0,1}empresa|voce).com/i
describe HSC_BR_WWW_SUAEMPRESA www.suaempresa.com.br (e similares)
score HSC_BR_WWW_SUAEMPRESA 0.8
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '204', 
			'type' => 'uri', 
			'name' => 'HSC_BR_USER_URI', 
			'value' => 'uri HSC_BR_USER_URI //~/
describe HSC_BR_USER_URI Chamada para URI de usuario
score HSC_BR_USER_URI 0.3
', 
			'created_at' => '2011-02-01 12:49:54', 
			'updated_at' => '2011-02-01 12:49:54', 
			'deleted_at' => '2018-03-26 19:33:12', 
            ],
            [
			'id' => '205', 
			'type' => 'uri', 
			'name' => 'HSC_BR_SPAMMER_URI
', 
			'value' => 'uri HSC_BR_SPAMMER_URI /renda-*extra|formulario|sexo|penis|gostosa|e-*mail|mulheres|ninfeta|venda|ganhe|mala-*direta|grampo|promo.{2}o|oportunidade|livre-*se|divulg|respond|remov/i
describe HSC_BR_SPAMMER_URI Texto suspeito
score HSC_BR_SPAMMER_URI 1.0
', 
			'created_at' => '2011-03-24 11:23:48', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '206', 
			'type' => 'uri', 
			'name' => 'HSC_BR_CJB_URI
', 
			'value' => 'uri HSC_BR_CJB_URI /.cjb.net/i
describe HSC_BR_CJB_URI Link para sites no cjb.net
score HSC_BR_CJB_URI 0.6
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '207', 
			'type' => 'uri', 
			'name' => 'HSC_BR_KITNET_URI
', 
			'value' => 'uri HSC_BR_KITNET_URI /.kit.net/i
describe HSC_BR_KITNET_URI Link para sites no kit.net
score HSC_BR_KITNET_URI 0.8
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '208', 
			'type' => 'uri', 
			'name' => 'HSC_BR_FREEHOST_URI
', 
			'value' => 'uri HSC_BR_FREEHOST_URI /.freesites.com.br|netfirms.com/i
describe HSC_BR_FREEHOST_URI Link para sites de hospedagem gratis
score HSC_BR_FREEHOST_URI 0.8
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '209', 
			'type' => 'uri', 
			'name' => 'HSC_BR_HPG_URI
', 
			'value' => 'uri HSC_BR_HPG_URI /.(?:hpg|ig).com.br/i
describe HSC_BR_HPG_URI Link para sites no HPG
score HSC_BR_HPG_URI 0.8
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '210', 
			'type' => 'uri', 
			'name' => 'HSC_BR_ML_URI
', 
			'value' => 'uri HSC_BR_ML_URI /.mercadoli[vb]re.com/i
describe HSC_BR_ML_URI Link para produtos no Mercado Livre
score HSC_BR_ML_URI 0.8
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '211', 
			'type' => 'uri', 
			'name' => 'HSC_BR_WWW_SUAEMPRESA_URI
', 
			'value' => 'uri HSC_BR_WWW_SUAEMPRESA_URI /.(?:(?:sua-*){0,1}empresa|voce).com/i
describe HSC_BR_WWW_SUAEMPRESA_URI www.suaempresa.com.br (e similares)
score HSC_BR_WWW_SUAEMPRESA_URI 1.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '212', 
			'type' => 'rowbody', 
			'name' => 'HSC_BR_INTERNET_EMAIL', 
			'value' => 'rawbody HSC_BR_INTERNET_EMAIL /(0022)http://internet.e-mail - >/
describe HSC_BR_INTERNET_EMAIL Saved URL com internet.e-mail
score HSC_BR_INTERNET_EMAIL 1.0
', 
			'created_at' => '2011-02-01 12:50:05', 
			'updated_at' => '2011-02-01 12:50:05', 
			'deleted_at' => '2018-03-26 19:33:12', 
            ],
            [
			'id' => '213', 
			'type' => 'rowbody', 
			'name' => 'HSC_BR_HTML_TITLE', 
			'value' => 'rawbody HSC_BR_HTML_TITLE /<s*titles*>s*(.)1 [^<]*(.)2 s*</title>/i
describe HSC_BR_HTML_TITLE Title suspeito
score HSC_BR_HTML_TITLE 1.5
', 
			'created_at' => '2011-02-01 12:53:49', 
			'updated_at' => '2011-02-01 12:53:49', 
			'deleted_at' => '2018-03-26 19:33:12', 
            ],
            [
			'id' => '214', 
			'type' => 'rowbody', 
			'name' => 'HSC_BR_HTML_TITLE_KEYS', 
			'value' => 'full HSC_BR_HTML_TITLE_KEYS /<s*titles*>.*(?:divulg|melhor|livre-se|oportunidade|marketing|earn|money|viagra|penis|sexo).*</title>/i
describe HSC_BR_HTML_TITLE_KEYS Palavras-chave no title
score HSC_BR_HTML_TITLE_KEYS 2.0
', 
			'created_at' => '2011-02-01 12:52:07', 
			'updated_at' => '2011-02-01 12:52:07', 
			'deleted_at' => '2018-03-26 19:33:12', 
            ],
            [
			'id' => '215', 
			'type' => 'rowbody', 
			'name' => 'HSC_BR_NEDSTAT
', 
			'value' => 'rawbody HSC_BR_NEDSTAT /nedstatbasic/i
describe HSC_BR_NEDSTAT Tracking do Nedstat
score HSC_BR_NEDSTAT 1.8
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '216', 
			'type' => 'rowbody', 
			'name' => 'HSC_BR_MALADIRETA
', 
			'value' => 'rawbody HSC_BR_MALADIRETA /mala.{0,5}direta/i
describe HSC_BR_MALADIRETA Inclui 'Mala Direta'
score HSC_BR_MALADIRETA 0.4
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '217', 
			'type' => 'rowbody', 
			'name' => 'HSC_BR_MALADIRETA
', 
			'value' => 'rawbody HSC_BR_MALADIRETA2 /mala.{0,5}diretas+des+e-*mail'*s*/i
describe HSC_BR_MALADIRETA2 Inclui 'Mala Direta de e-mail'
score HSC_BR_MALADIRETA2 0.8
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '218', 
			'type' => 'rowbody', 
			'name' => 'HSC_BR_REMOVER_QUOTE
', 
			'value' => 'rawbody HSC_BR_REMOVER_QUOTE /["'>;]+remover*[(?:&quote;)<"']+/i
describe HSC_BR_REMOVER_QUOTE Inclui texto para remover email (quote)
score HSC_BR_REMOVER_QUOTE 0.8
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '219', 
			'type' => 'rowbody', 
			'name' => 'HSC_BR_DECRETO
', 
			'value' => 'rawbody HSC_BR_DECRETO /bDecretos+S.*s*1618b/i
describe HSC_BR_DECRETO Falso Decreto sobre spam
score HSC_BR_DECRETO 0.4
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '220', 
			'type' => 'rowbody', 
			'name' => 'HSC_BR_CONGRESSO
', 
			'value' => 'rawbody HSC_BR_CONGRESSO /CongressoW+(?:BaseW+){0,1}dasW+NormativasW+InternacionaisW+sobreW+(?:oW+){0,1}SPAM/i
describe HSC_BR_CONGRESSO Congresso Base das Normativas Int. sobre Spam?
score HSC_BR_CONGRESSO 2.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '221', 
			'type' => 'rowbody', 
			'name' => 'HSC_BR_CLIQUE_AQUI
', 
			'value' => 'rawbody HSC_BR_CLIQUE_AQUI /cli(?:que|[ck]+|[ck]+ar)(?:W+|(?:s*<[^>]+>s*)+)(?:aqui|abaixo)/i
describe HSC_BR_CLIQUE_AQUI Contem o texto 'Clique aqui'
score HSC_BR_CLIQUE_AQUI 1.8
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '222', 
			'type' => 'rowbody', 
			'name' => 'HSC_BR_CALL_KITNET
', 
			'value' => 'rawbody HSC_BR_CALL_KITNET /src=S+kit.net/i
describe HSC_BR_CALL_KITNET Chamando url no kit.net (src=)
score HSC_BR_CALL_KITNET 1.5
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '223', 
			'type' => 'uri', 
			'name' => 'HSC_RULE_URI_
', 
			'value' => 'uri HSC_RULE_URI_0130   /emailprospect\.com\.br/i
score HSC_RULE_URI_0130 6.0', 
			'created_at' => '2011-03-15 14:30:22', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '224', 
			'type' => 'uri', 
			'name' => 'HSC_RULE_URI_
', 
			'value' => 'uri HSC_RULE_URI_0132   /unsubscribe/i
score HSC_RULE_URI_0132 1.0
', 
			'created_at' => '2011-03-15 14:31:14', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '225', 
			'type' => 'rowbody', 
			'name' => 'HSC_BR_NAO_MAIS_
', 
			'value' => 'rawbody HSC_BR_NAO_MAIS_2 /paraW+deixarW+deW+receberW+estas*W+mensage[mn]/i
describe HSC_BR_NAO_MAIS_2 Texto sobre nao receber mais a mensagem
score HSC_BR_NAO_MAIS_2 1.3
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '226', 
			'type' => 'rowbody', 
			'name' => 'HSC_BR_NAO_MAIS_
', 
			'value' => 'rawbody HSC_BR_NAO_MAIS_3 /n(?:ã|�?|a|&atilde;)oW+(?:estaremosW+enviando|enviaremos)W+estas*W+mensage[mn]W+(?:novamente|des+novo|umas+segundas+vez)/i
describe HSC_BR_NAO_MAIS_3 Texto sobre nao receber mais a mensagem
score HSC_BR_NAO_MAIS_3 1.3
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '227', 
			'type' => 'rowbody', 
			'name' => 'HSC_BR_NOT_SPAM
', 
			'value' => 'rawbody HSC_BR_NOT_SPAM /est.s+S+s*(?:,*s*segundos+as+novas+legisla.{1,2}(?:a|ã|�?|&atilde;)os*,*s+){0,1}n(?:ã|�?|a|&atilde;)os+(?:podes+ser|é|�?|e|&eacute;)(?:s+considerad[ao])(?:s+um){0,1}s+spam/i
describe HSC_BR_NOT_SPAM Dizendo que a msg não é um spam
score HSC_BR_NOT_SPAM 1.0
', 
			'created_at' => '2011-01-27 14:56:21', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '228', 
			'type' => 'uri', 
			'name' => 'HSC_RULE_URI_
', 
			'value' => 'uri HSC_RULE_URI_0201   /www\.fileden\.com/i
score HSC_RULE_URI_0201 3.0
uri HSC_RULE_URI_0202   /chave[s]desegunranca/i
score HSC_RULE_URI_0202 2.0
uri HSC_RULE_URI_0203   /serveblog\.net/i
score HSC_RULE_URI_0203 3.0



', 
			'created_at' => '2011-03-11 17:50:11', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '229', 
			'type' => 'body', 
			'name' => 'HSC_RULE_
', 
			'value' => 'body HSC_RULE_0102   /Consta em nosso sistema uma fatura vencida referente/i
score HSC_RULE_0102  2.0', 
			'created_at' => '2011-03-11 17:51:32', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '230', 
			'type' => 'body', 
			'name' => 'HSC_RULE_
', 
			'value' => 'body HSC_RULE_0103      /Para obter mais informa[c,�][o,�]es acesse o link abaixo/i
score HSC_RULE_0103     1.7
', 
			'created_at' => '2011-03-11 17:53:41', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '231', 
			'type' => 'meta', 
			'name' => '__HSC_COB_BODY_
', 
			'value' => 'body __HSC_COB_BODY_000 /Caro parceiro comercial/i
body __HSC_COB_BODY_001 /ODEBRECHT CONSTRUTORA LTDA/i
body __HSC_COB_BODY_002 /Or[ç,c]amento/i
body __HSC_COB_BODY_003 /arquivo em anexo no link abaixo/i
body __HSC_COB_BODY_004 /Estamos aguardando as cotações até a data limite/i
body __HSC_COB_BODY_005 /Favor remeter sua proposta/i
body __HSC_COB_BODY_006 /Consulte os itens  descriminados no or[ç,c]amento/i
body __HSC_COB_BODY_007 /serão aceitas as propostas que constarem preços/i
body __HSC_COB_BODY_008 /formas de pagamento, e o prazo para entrega/i
uri __HSC_COB_URL_001 /contacao/i
uri __HSC_COB_URL_002 /cobranca/i
uri __HSC_COB_URL_003 /orcamento/i
uri __HSC_COB_URL_004 /fileden\.com/i
body __HSC_COB_NAME_001 /COMPACTA ENGENHARIA e CONSTRUTORA LTDA/i
body __HSC_COB_NAME_002 /ASCOL - ASSESSORIA de COBRANCAS LTDA/i
body __HSC_COB_NAME_003 /Grupo CONSTRUTEC ENGENHARIA/i
body __HSC_COB_NAME_004 /TECNISA CONTRUTORA e ENGENHARIA LTDA/i

meta     HSC_COBRANCA_10 (__HSC_COB_BODY_000 + __HSC_COB_BODY_001 + __HSC_COB_BODY_002 + __HSC_COB_BODY_003 + __HSC_COB_BODY_004 + __HSC_COB_BODY_005 + __HSC_COB_BODY_006 + __HSC_COB_BODY_007 + __HSC_COB_BODY_008 + __HSC_COB_URL_001 + __HSC_COB_URL_002 + __HSC_COB_URL_003 + __HSC_COB_URL_004 + __HSC_COB_NAME_001 + __HSC_COB_NAME_002 + __HSC_COB_NAME_003 + __HSC_COB_NAME_004 == 1)
score    HSC_COBRANCA_10 0.5
describe HSC_COBRANCA_10 Emails Text De cobranca . 1 HIT

meta     HSC_COBRANCA_20 (__HSC_COB_BODY_000 + __HSC_COB_BODY_001 + __HSC_COB_BODY_002 + __HSC_COB_BODY_003 + __HSC_COB_BODY_004 + __HSC_COB_BODY_005 + __HSC_COB_BODY_006 + __HSC_COB_BODY_007 + __HSC_COB_BODY_008 + __HSC_COB_URL_001 + __HSC_COB_URL_002 + __HSC_COB_URL_003 + __HSC_COB_URL_004 + __HSC_COB_NAME_001 + __HSC_COB_NAME_002 + __HSC_COB_NAME_003 + __HSC_COB_NAME_004 == 2)
score    HSC_COBRANCA_20 0.8
describe HSC_COBRANCA_20 Emails Text De cobranca . 2 HITS

meta     HSC_COBRANCA_30 (__HSC_COB_BODY_000 + __HSC_COB_BODY_001 + __HSC_COB_BODY_002 + __HSC_COB_BODY_003 + __HSC_COB_BODY_004 + __HSC_COB_BODY_005 + __HSC_COB_BODY_006 + __HSC_COB_BODY_007 + __HSC_COB_BODY_008 + __HSC_COB_URL_001 + __HSC_COB_URL_002 + __HSC_COB_URL_003 + __HSC_COB_URL_004 + __HSC_COB_NAME_001 + __HSC_COB_NAME_002 + __HSC_COB_NAME_003 + __HSC_COB_NAME_004 == 3)
score    HSC_COBRANCA_30 2.5
describe HSC_COBRANCA_30 Emails Text De cobranca . 3 HITS

meta     HSC_COBRANCA_40 (__HSC_COB_BODY_000 + __HSC_COB_BODY_001 + __HSC_COB_BODY_002 + __HSC_COB_BODY_003 + __HSC_COB_BODY_004 + __HSC_COB_BODY_005 + __HSC_COB_BODY_006 + __HSC_COB_BODY_007 + __HSC_COB_BODY_008 + __HSC_COB_URL_001 + __HSC_COB_URL_002 + __HSC_COB_URL_003 + __HSC_COB_URL_004 + __HSC_COB_NAME_001 + __HSC_COB_NAME_002 + __HSC_COB_NAME_003 + __HSC_COB_NAME_004 == 4)
score    HSC_COBRANCA_40 6.8
describe HSC_COBRANCA_40 Emails Text De cobranca . 4 HITS

meta     HSC_COBRANCA_50 (__HSC_COB_BODY_000 + __HSC_COB_BODY_001 + __HSC_COB_BODY_002 + __HSC_COB_BODY_003 + __HSC_COB_BODY_004 + __HSC_COB_BODY_005 + __HSC_COB_BODY_006 + __HSC_COB_BODY_007 + __HSC_COB_BODY_008 + __HSC_COB_URL_001 + __HSC_COB_URL_002 + __HSC_COB_URL_003 + __HSC_COB_URL_004 + __HSC_COB_NAME_001 + __HSC_COB_NAME_002 + __HSC_COB_NAME_003 + __HSC_COB_NAME_004 == 5)
score    HSC_COBRANCA_50 7.0
describe HSC_COBRANCA_50 Emails Text De cobranca . 5 HITS

meta     HSC_COBRANCA_60 (__HSC_COB_BODY_000 + __HSC_COB_BODY_001 + __HSC_COB_BODY_002 + __HSC_COB_BODY_003 + __HSC_COB_BODY_004 + __HSC_COB_BODY_005 + __HSC_COB_BODY_006 + __HSC_COB_BODY_007 + __HSC_COB_BODY_008 + __HSC_COB_URL_001 + __HSC_COB_URL_002 + __HSC_COB_URL_003 + __HSC_COB_URL_004 + __HSC_COB_NAME_001 + __HSC_COB_NAME_002 + __HSC_COB_NAME_003 + __HSC_COB_NAME_004 >= 6)
score    HSC_COBRANCA_60 8.0
describe HSC_COBRANCA_60 Emails Text De cobranca . 6 ou + HITS

', 
			'created_at' => '2011-03-15 14:22:39', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '232', 
			'type' => 'body', 
			'name' => 'HSC_BR_OLHADELA', 
			'value' => 'body HSC_BR_OLHADELA_04     /relacionamento@olhadela.com.br/i
score HSC_BR_OLHADELA_04     6.0', 
			'created_at' => '2013-05-06 13:27:16', 
			'updated_at' => '2013-05-06 13:27:16', 
			'deleted_at' => '2018-03-26 19:33:12', 
            ],
            [
			'id' => '233', 
			'type' => 'body', 
			'name' => 'HSC_BR_BELCORP_
', 
			'value' => 'body HSC_BR_BELCORP_01     /O Brasil precisa de cada vez mais pessoas como/i
score HSC_BR_BELCORP_01     3.0', 
			'created_at' => '2012-02-29 10:54:26', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '234', 
			'type' => 'body', 
			'name' => 'HSC_BR_BELCORP_
', 
			'value' => 'body HSC_BR_BELCORP_02     /que tem mudado a vida de milhares de pessoas/i
score HSC_BR_BELCORP_02     3.0', 
			'created_at' => '2012-02-29 10:54:48', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '235', 
			'type' => 'body', 
			'name' => 'HSC_BR_BELCORP_
', 
			'value' => 'body HSC_BR_BELCORP_03     /sejabelcorp/i
score HSC_BR_BELCORP_03     3.0', 
			'created_at' => '2012-02-29 10:55:08', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '236', 
			'type' => 'uri', 
			'name' => 'HSC_RULE_URI_
', 
			'value' => 'uri HSC_RULE_URI_0136   /equipehinode\.com/i
score HSC_RULE_URI_0136 6.0', 
			'created_at' => '2012-02-29 10:58:12', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '237', 
			'type' => 'uri', 
			'name' => 'HSC_RULE_URI_
', 
			'value' => 'uri HSC_RULE_URI_0137   /menospreco\.com/i
score HSC_RULE_URI_0137 6.0', 
			'created_at' => '2012-02-29 10:59:51', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '238', 
			'type' => 'body', 
			'name' => 'HSC_BR_MENOSPRECO_
', 
			'value' => 'body HSC_BR_MENOSPRECO_01     /Compras Coletivas/i
score HSC_BR_MENOSPRECO_01     1.0', 
			'created_at' => '2012-02-29 11:00:31', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '239', 
			'type' => 'body', 
			'name' => 'HSC_BR_MENOSPRECO_
', 
			'value' => 'body HSC_BR_MENOSPRECO_02     /Veja as Ofertas do dia/i
score HSC_BR_MENOSPRECO_02     3.0', 
			'created_at' => '2012-02-29 11:00:59', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '240', 
			'type' => 'body', 
			'name' => 'HSC_BR_MENOSPRECO_
', 
			'value' => 'body HSC_BR_MENOSPRECO_03     /Para garantir que nossos comunicados cheguem em sua caixa de entrada/i
score HSC_BR_MENOSPRECO_03     3.0', 
			'created_at' => '2012-02-29 11:02:07', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '241', 
			'type' => 'body', 
			'name' => 'HSC_BR_MENOSPRECO_
', 
			'value' => 'body HSC_BR_MENOSPRECO_04     /simplesmente clique no seguinte link/i
score HSC_BR_MENOSPRECO_04     3.0', 
			'created_at' => '2012-02-29 11:03:17', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '242', 
			'type' => 'uri', 
			'name' => 'HSC_RULE_URI_
', 
			'value' => 'uri HSC_RULE_URI_0138   /WINLOAD2012.\.asp/i
score HSC_RULE_URI_0138 3.0', 
			'created_at' => '2012-04-02 09:30:57', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '243', 
			'type' => 'body', 
			'name' => 'HSC_BR_FACE_
', 
			'value' => 'body HSC_BR_FACE_01     /se\ importar\ eu\ vou\ colocar\ rsrs/i
score HSC_BR_FACE_01     3.0', 
			'created_at' => '2012-04-02 09:32:27', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '244', 
			'type' => 'header', 
			'name' => 'HSC_
', 
			'value' => 'header      HSC_1000142_OTRS      Subject =~ /^Vendo chip com numero facil/i
score    HSC_1000142_OTRS      3.0', 
			'created_at' => '2012-05-29 08:48:49', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '245', 
			'type' => 'uri', 
			'name' => 'HSC_
', 
			'value' => 'uri      HSC_1000148_OTRS_01       /MU3rDt/i
score      HSC_1000148_OTRS_01      6', 
			'created_at' => '2012-05-29 16:52:06', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '246', 
			'type' => 'uri', 
			'name' => 'HSC_
', 
			'value' => 'uri      HSC_1000148_OTRS_02       /bit.ly/i
score      HSC_1000148_OTRS_02      2', 
			'created_at' => '2012-05-29 16:51:47', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '247', 
			'type' => 'body', 
			'name' => 'HSC_
', 
			'value' => 'body       HSC_1000148_OTRS_03       /o acesso ao Internet Banking Santander Empresarial ser� realizado somente pela nova ferramenta/i
score       HSC_1000148_OTRS_03       3', 
			'created_at' => '2012-05-29 16:54:25', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '248', 
			'type' => 'body', 
			'name' => 'HSC_
', 
			'value' => 'body       HSC_1000148_OTRS_04       /Clique aqui - Iniciar Instala��o/i
score       HSC_1000148_OTRS_04       3', 
			'created_at' => '2012-05-29 16:56:06', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '249', 
			'type' => 'uri', 
			'name' => 'HSC_
', 
			'value' => 'uri       HSC_1000149_OTRS_01       /KLgJQm/i
score       HSC_1000149_OTRS_01       6', 
			'created_at' => '2012-05-29 17:04:27', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '250', 
			'type' => 'body', 
			'name' => 'HSC_
', 
			'value' => 'body       HSC_1000149_OTRS_02       /Dispositivo Token Desativado/i
score       HSC_1000149_OTRS_02       3', 
			'created_at' => '2012-05-29 17:04:51', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '251', 
			'type' => 'body', 
			'name' => 'HSC_
', 
			'value' => 'body       HSC_1000149_OTRS_03       /Informamos que seu dispositivo Token encontra-se desativado de acordo com nossa ultima atualiza��o de sistema/i
score       HSC_1000149_OTRS_03       3', 
			'created_at' => '2012-05-29 17:05:07', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '252', 
			'type' => 'body', 
			'name' => 'HSC_
', 
			'value' => 'body       HSC_1000149_OTRS_04       /para reativar o dispositivo acesse nosso link abaixo e siga todas os procedimentos exigidos pelo sistema de reativa��o/i
score       HSC_1000149_OTRS_04       3', 
			'created_at' => '2012-05-29 17:06:10', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '253', 
			'type' => 'header', 
			'name' => 'HSC_
', 
			'value' => 'header      HSC_1000158_OTRS_01      Subject =~ /^Atendimento Van Gogh/i
score    HSC_1000158_OTRS_01      2.0', 
			'created_at' => '2012-06-13 14:11:53', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '254', 
			'type' => 'body', 
			'name' => 'HSC_
', 
			'value' => 'body       HSC_1000158_OTRS_02       /foi lan�ada uma atualiza��o do modulo de seguran�a para corre��o de erros/i
score       HSC_1000158_OTRS_02       3', 
			'created_at' => '2012-06-13 14:11:27', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '255', 
			'type' => 'body', 
			'name' => 'HSC_
', 
			'value' => 'body       HSC_1000158_OTRS_03       /vem para garantir o n�vel de seguran�a informado em contrato/i
score       HSC_1000158_OTRS_03       3', 
			'created_at' => '2012-06-13 14:12:37', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '256', 
			'type' => 'body', 
			'name' => 'HSC_
', 
			'value' => 'body       HSC_1000158_OTRS_04       /poder� implicar no bloqueio autom�tico da conta para qualquer transa��o por raz�es de seguran�a/i
score       HSC_1000158_OTRS_04       3', 
			'created_at' => '2012-06-13 14:13:00', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '257', 
			'type' => 'uri', 
			'name' => 'HSC_RULE_
', 
			'value' => 'uri HSC_RULE_20130923_01 /admini\.phpforms\.net\/f/i
score HSC_RULE_20130923_01  5.8

uri HSC_RULE_20130923_02 /www\.dropbox\.com\/s/i
score HSC_RULE_20130923_02  3.8', 
			'created_at' => '2013-09-23 10:39:00', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '258', 
			'type' => 'uri', 
			'name' => 'HSC_RULE_
', 
			'value' => 'uri HSC_RULE_264 /campuschannel\.itb\.ac\.id/i
score HSC_RULE_264  3.8', 
			'created_at' => '2013-10-31 10:16:51', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '259', 
			'type' => 'body', 
			'name' => 'HSC_RULE_
', 
			'value' => 'body HSC_RULE_265 /aos pedidos entrar em contato conosco que/i
score HSC_RULE_265 3', 
			'created_at' => '2013-10-22 12:42:27', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '260', 
			'type' => 'uri', 
			'name' => 'HSC_RULE_', 
			'value' => 'uri HSC_RULE_266 /envio-certo\.info/i
score HSC_RULE_266  3.8', 
			'created_at' => '2013-10-31 10:16:37', 
			'updated_at' => '2013-10-31 10:16:37', 
			'deleted_at' => '2018-03-26 19:33:12', 
            ],
            [
			'id' => '261', 
			'type' => 'header', 
			'name' => 'HSC_RULE_
', 
			'value' => 'header  HSC_RULE_267  Subject =~ /Mega Oferta|Frete Zero/i
score  HSC_RULE_267  1.5
', 
			'created_at' => '2013-10-31 13:29:08', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '262', 
			'type' => 'header', 
			'name' => 'HSC_RULE_
', 
			'value' => 'header  HSC_RULE_268  Subject =~ /Responda agora para continuar ganhando/i
score  HSC_RULE_268  1.5', 
			'created_at' => '2013-10-31 13:31:35', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '263', 
			'type' => 'body', 
			'name' => '__HSC_MKT_EMAIL_
', 
			'value' => 'header  __HSC_MKT_EMAIL_001  From =~ /\@.*(emkt.submarino.com.br|mkt.americanas.com|grouponmail.com.br|adoroviagem.com.br|trimrust.com.br|service.alibaba.com)/i
header  __HSC_MKT_EMAIL_002  From =~ /(news\@panvel.com.br|social\@saudeja.com.br|contato\@odilardo.com.br|naoresponda\@peixeurbano.com.br|ofertas\@pauta.com.br|envio\@assinepanini.com.br|contato\@espigademilho.com)/i
meta  HSC_MKT_EMAIL_001 (__HSC_MKT_EMAIL_001 || __HSC_MKT_EMAIL_002)
describe        HSC_MKT_EMAIL_001           Mail Marketing From:
score   HSC_MKT_EMAIL_001       3.5

header  __HSC_MKT_EMAIL_003  From =~ /\@.*(peixeurbano.com.br|assinepanini.com.br|espigademilho.com)/i
meta  HSC_MKT_EMAIL_002 (__HSC_MKT_EMAIL_001)
describe        HSC_MKT_EMAIL_002           Mail Marketing From Suspect Domains 
score   HSC_MKT_EMAIL_002       1.0', 
			'created_at' => '2014-05-14 09:54:10', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '264', 
			'type' => 'body', 
			'name' => 'USER_IN_DEF_DKIM_WL', 
			'value' => 'score USER_IN_DEF_DKIM_WL -0.3', 
			'created_at' => '2014-09-04 15:29:58', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
            [
			'id' => '265', 
			'type' => 'meta', 
			'name' => 'RAZOR2_CHECK', 
			'value' => 'score RAZOR2_CHECK  1.0', 
			'created_at' => '2015-10-05 12:05:13', 
			'updated_at' => '2015-10-05 12:05:13', 
			'deleted_at' => '2018-03-26 19:33:12', 
            ],
            [
			'id' => '266', 
			'type' => 'body', 
			'name' => 'HSC_PHISHING_SIGS_HTML_META', 
			'value' => 'body        HSC_PHISHING_SIGS_HTML_META  eval:hsc_check_attachment_content('(http\-equiv=[\"\']*Refresh[\"\']*){DLP}1')
describe    HSC_PHISHING_SIGS_HTML_META
score       HSC_PHISHING_SIGS_HTML_META  15
', 
			'created_at' => '2015-10-05 11:53:29', 
			'updated_at' => '2015-10-05 11:53:29', 
			'deleted_at' => '2018-03-26 19:33:12', 
            ],
            [
			'id' => '267', 
			'type' => 'meta', 
			'name' => '__HSC_SUSPECT_FILE_RULE_
', 
			'value' => '# HSC SUSPECT HTML FILE

rawbody        __HSC_SUSPECT_FILE_RULE_02  /<.*form.*method=[\'\"].*[\'\"]/i
rawbody        __HSC_SUSPECT_FILE_RULE_03  /<.*input.*type=[\'\"]password[\'\"]/i
rawbody        __HSC_SUSPECT_FILE_RULE_04  /<.*meta.*http-equiv=[\'\"]refresh[\'\"]/i

meta        HSC_SUSPECT_FILE_RULE  ((__HSC_SUSPECT_FILE_RULE_02) || (__HSC_SUSPECT_FILE_RULE_03) || (__HSC_SUSPECT_FILE_RULE_04))
score       HSC_SUSPECT_FILE_RULE  7



# HSC SUSPECT MAIL 

body        __HSC_SUSPECT_MAIL_RULE_001 /(zimbra|servidor|administrador|equipe|Banco.*de.*Dados)/i
body        __HSC_SUSPECT_MAIL_RULE_002 /(atualizacao|atualizada|atualizando|atualizar|versao)/i
body        __HSC_SUSPECT_MAIL_RULE_003 /(conta|senha|password|confirmar|Confirme.*senha|nome.*completo|user|usuario|Data.*nascimento)/i

meta        HSC_SUSPECT_MAIL_RULE (__HSC_SUSPECT_MAIL_RULE_001 + __HSC_SUSPECT_MAIL_RULE_002 + __HSC_SUSPECT_MAIL_RULE_003 >= 2 )
score       HSC_SUSPECT_MAIL_RULE 3.7', 
			'created_at' => '2018-03-20 17:28:42', 
			'updated_at' => '2018-03-26 20:14:46', 
			'deleted_at' => '', 
            ],
        ]);
    }
}

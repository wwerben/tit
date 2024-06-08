<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz danych</title>
    <script src="scripts.js"></script>

</head>
<body>
<form action="index.php?action=register" method="post" onsubmit="return validateForm()">
        E-mail <input type="email" name="email" required id="email" maxlength="50" autofocus><br><br>
        Imię <input type="text" name="firstName" required id="firstName" maxlength="30"><br><br>
        Nazwisko <input type="text" name="lastName" required id="lastName" maxlength="30"><br><br>
        Numer Telefonu <input type="tel" name="phoneNumber" required id="phoneNumber" pattern="[0-9]{9}"><br><br>
        Hasło <input type="password" name="pass" required id="pass"><br><br>
        Potwierdź hasło <input type="password" name="passAgain" required id="pass2"><br><br>


        <label for="region">Wybierz kraj:</label>
        <select id="region" name="region">
            <option value="afghanistan">Afganistan</option>
            <option value="albania">Albania</option>
            <option value="algeria">Algieria</option>
            <option value="andorra">Andora</option>
            <option value="angola">Angola</option>
            <option value="antigua-barbuda">Antigua i Barbuda</option>
            <option value="argentina">Argentyna</option>
            <option value="armenia">Armenia</option>
            <option value="australia">Australia</option>
            <option value="austria">Austria</option>
            <option value="azerbaijan">Azerbejdżan</option>
            <option value="bahamas">Bahamy</option>
            <option value="bahrain">Bahrajn</option>
            <option value="bangladesh">Bangladesz</option>
            <option value="barbados">Barbados</option>
            <option value="belarus">Białoruś</option>
            <option value="belgium">Belgia</option>
            <option value="belize">Belize</option>
            <option value="benin">Benin</option>
            <option value="bhutan">Bhutan</option>
            <option value="bolivia">Boliwia</option>
            <option value="bosnia-herzegovina">Bośnia i Hercegowina</option>
            <option value="botswana">Botswana</option>
            <option value="brazil">Brazylia</option>
            <option value="brunei">Brunei</option>
            <option value="bulgaria">Bułgaria</option>
            <option value="burkina-faso">Burkina Faso</option>
            <option value="burundi">Burundi</option>
            <option value="cabo-verde">Cabo Verde</option>
            <option value="cambodia">Kambodża</option>
            <option value="cameroon">Kamerun</option>
            <option value="canada">Kanada</option>
            <option value="central-african-republic">Republika Środkowoafrykańska</option>
            <option value="chad">Czad</option>
            <option value="chile">Chile</option>
            <option value="china">Chiny</option>
            <option value="colombia">Kolumbia</option>
            <option value="comoros">Komory</option>
            <option value="congo-brazzaville">Kongo (Brazzaville)</option>
            <option value="congo-kinshasa">Kongo (Kinszasa)</option>
            <option value="costa-rica">Kostaryka</option>
            <option value="croatia">Chorwacja</option>
            <option value="cuba">Kuba</option>
            <option value="cyprus">Cypr</option>
            <option value="czechia">Czechy</option>
            <option value="denmark">Dania</option>
            <option value="djibouti">Dżibuti</option>
            <option value="dominica">Dominika</option>
            <option value="dominican-republic">Dominikana</option>
            <option value="ecuador">Ekwador</option>
            <option value="egypt">Egipt</option>
            <option value="el-salvador">Salwador</option>
            <option value="equatorial-guinea">Gwinea Równikowa</option>
            <option value="eritrea">Erytrea</option>
            <option value="estonia">Estonia</option>
            <option value="eswatini">Eswatini</option>
            <option value="ethiopia">Etiopia</option>
            <option value="fiji">Fidżi</option>
            <option value="finland">Finlandia</option>
            <option value="france">Francja</option>
            <option value="gabon">Gabon</option>
            <option value="gambia">Gambia</option>
            <option value="georgia">Gruzja</option>
            <option value="germany">Niemcy</option>
            <option value="ghana">Ghana</option>
            <option value="greece">Grecja</option>
            <option value="grenada">Grenada</option>
            <option value="guatemala">Gwatemala</option>
            <option value="guinea">Gwinea</option>
            <option value="guinea-bissau">Gwinea Bissau</option>
            <option value="guyana">Gujana</option>
            <option value="haiti">Haiti</option>
            <option value="honduras">Honduras</option>
            <option value="hungary">Węgry</option>
            <option value="iceland">Islandia</option>
            <option value="india">Indie</option>
            <option value="indonesia">Indonezja</option>
            <option value="iran">Iran</option>
            <option value="iraq">Irak</option>
            <option value="ireland">Irlandia</option>
            <option value="israel">Izrael</option>
            <option value="italy">Włochy</option>
            <option value="jamaica">Jamajka</option>
            <option value="japan">Japonia</option>
            <option value="jordan">Jordania</option>
            <option value="kazakhstan">Kazachstan</option>
            <option value="kenya">Kenia</option>
            <option value="kiribati">Kiribati</option>
            <option value="north-korea">Korea Północna</option>
            <option value="south-korea">Korea Południowa</option>
            <option value="kosovo">Kosowo</option>
            <option value="kuwait">Kuwejt</option>
            <option value="kyrgyzstan">Kirgistan</option>
            <option value="laos">Laos</option>
            <option value="latvia">Łotwa</option>
            <option value="lebanon">Liban</option>
            <option value="lesotho">Lesotho</option>
            <option value="liberia">Liberia</option>
            <option value="libya">Libia</option>
            <option value="liechtenstein">Liechtenstein</option>
            <option value="lithuania">Litwa</option>
            <option value="luxembourg">Luksemburg</option>
            <option value="madagascar">Madagaskar</option>
            <option value="malawi">Malawi</option>
            <option value="malaysia">Malezja</option>
            <option value="maldives">Malediwy</option>
            <option value="mali">Mali</option>
            <option value="malta">Malta</option>
            <option value="marshall-islands">Wyspy Marshalla</option>
            <option value="mauritania">Mauretania</option>
            <option value="mauritius">Mauritius</option>
            <option value="mexico">Meksyk</option>
            <option value="micronesia">Mikronezja</option>
            <option value="moldova">Mołdawia</option>
            <option value="monaco">Monako</option>
            <option value="mongolia">Mongolia</option>
            <option value="montenegro">Czarnogóra</option>
            <option value="morocco">Maroko</option>
            <option value="mozambique">Mozambik</option>
            <option value="myanmar">Mjanma</option>
            <option value="namibia">Namibia</option>
            <option value="nauru">Nauru</option>
            <option value="nepal">Nepal</option>
            <option value="netherlands">Holandia</option>
            <option value="new-zealand">Nowa Zelandia</option>
            <option value="nicaragua">Nikaragua</option>
            <option value="niger">Niger</option>
            <option value="nigeria">Nigeria</option>
            <option value="north-macedonia">Macedonia Północna</option>
            <option value="norway">Norwegia</option>
            <option value="oman">Oman</option>
            <option value="pakistan">Pakistan</option>
            <option value="palau">Palau</option>
            <option value="palestine">Palestyna</option>
            <option value="panama">Panama</option>
            <option value="papua-new-guinea">Papua-Nowa Gwinea</option>
            <option value="paraguay">Paragwaj</option>
            <option value="peru">Peru</option>
            <option value="philippines">Filipiny</option>
            <option value="poland" selected>Polska</option>
            <option value="portugal">Portugalia</option>
            <option value="qatar">Katar</option>
            <option value="romania">Rumunia</option>
            <option value="russia">Rosja</option>
            <option value="rwanda">Rwanda</option>
            <option value="saint-kitts-nevis">Saint Kitts i Nevis</option>
            <option value="saint-lucia">Saint Lucia</option>
            <option value="saint-vincent-grenadines">Saint Vincent i Grenadyny</option>
            <option value="samoa">Samoa</option>
            <option value="san-marino">San Marino</option>
            <option value="sao-tome-principe">Wyspy Świętego Tomasza i Książęca</option>
            <option value="saudi-arabia">Arabia Saudyjska</option>
            <option value="senegal">Senegal</option>
            <option value="serbia">Serbia</option>
            <option value="seychelles">Seszele</option>
            <option value="sierra-leone">Sierra Leone</option>
            <option value="singapore">Singapur</option>
            <option value="slovakia">Słowacja</option>
            <option value="slovenia">Słowenia</option>
            <option value="solomon-islands">Wyspy Salomona</option>
            <option value="somalia">Somalia</option>
            <option value="south-africa">Republika Południowej Afryki</option>
            <option value="south-sudan">Sudan Południowy</option>
            <option value="spain">Hiszpania</option>
            <option value="sri-lanka">Sri Lanka</option>
            <option value="sudan">Sudan</option>
            <option value="suriname">Surinam</option>
            <option value="sweden">Szwecja</option>
            <option value="switzerland">Szwajcaria</option>
            <option value="syria">Syria</option>
            <option value="taiwan">Tajwan</option>
            <option value="tajikistan">Tadżykistan</option>
            <option value="tanzania">Tanzania</option>
            <option value="thailand">Tajlandia</option>
            <option value="timor-leste">Timor Wschodni</option>
            <option value="togo">Togo</option>
            <option value="tonga">Tonga</option>
            <option value="trinidad-tobago">Trynidad i Tobago</option>
            <option value="tunisia">Tunezja</option>
            <option value="turkey">Turcja</option>
            <option value="turkmenistan">Turkmenistan</option>
            <option value="tuvalu">Tuvalu</option>
            <option value="uganda">Uganda</option>
            <option value="ukraine">Ukraina</option>
            <option value="united-arab-emirates">Zjednoczone Emiraty Arabskie</option>
            <option value="united-kingdom">Wielka Brytania</option>
            <option value="united-states">Stany Zjednoczone</option>
            <option value="uruguay">Urugwaj</option>
            <option value="uzbekistan">Uzbekistan</option>
            <option value="vanuatu">Vanuatu</option>
            <option value="vatican-city">Watykan</option>
            <option value="venezuela">Wenezuela</option>
            <option value="vietnam">Wietnam</option>
            <option value="yemen">Jemen</option>
            <option value="zambia">Zambia</option>
            <option value="zimbabwe">Zimbabwe</option>
        </select><br><br>
        
        <input type="submit" value="Zarejestruj">
    </form>
</body>
</html>
# Kalkulator BMI :mechanical_arm:
Kalkulator BMI (body-mass index) adalah sebuah program yang menghitung indeks masa tubuh dan mengecek apakah berat badan Anda ideal atau tidak. Rumus yang digunakan untuk menghitung BMI adalah:

<p align="center"><img src="https://user-images.githubusercontent.com/52058660/131056213-14128e17-3e25-458b-b21d-4eba5b19703f.png"></p>

Nilai dari hasil perhitungan BMI akan dikelompokkan menjadi 3 label berikut:<br>
- Underweight (BMI <= 18,4)
- Normal (18,4 <= BMI <= 24,9)
- Overweight (BMI >= 25)

## Url yang aktif (updated)
**>>>https://16be-182-253-250-99.ngrok.io/<<<**<br>
(**maaf jika domain yang saya diberikan berbeda dengan domain pada gambar karena koneksi internet saya kadang error dan ketika direstart ngrok akan memberikan domain yang berbeda**). 

## Cara Penggunaan
Anda cukup memasukkan nilai berat badan dalam satuan Kg dan nilai tinggi badan dalam satuan cm, lalu tekan tombol hitung. Program akan otomatis menghitung nilai BMI anda dan menampikannya dalam format json. <br><br>
**Contoh:**<br>
Misalkan anda memiliki berat 65 kg dan tinggi 170 cm.<br><br>
<img width="745" alt="gambar" src="https://user-images.githubusercontent.com/52058660/131222033-12381299-38a2-4b16-b0f0-fdf6d58e7b0e.png"><br>

Setelah menekan tombol hitung, program akan menghasilkan output dalam format json. Dapat dilihat pada gambar dibawah outputnya adalah nilai bmi 22,5 dan label bmi "normal".<br><br>
<img width="743" alt="gambar" src="https://user-images.githubusercontent.com/52058660/131222059-69cd4bba-ba3a-46eb-9754-cb4db181c5ac.png"><br>


## Teknologi
- HTML v5 dan CSS v3- Front-end
- PHP v7.4.3 - Back-emd
- MySQL v8.0 - Database
- Apache2 - Web server sorver
- ModSecurity v2.0 - Web application firewall (WAF)
- Fail2ban v0.11.1 - 
- Ubuntu 20.04 - Server

## Deployment
- **Ngrok**<br>
Untuk proyek ini saya mendeploy programnya pada VM lokal. Agar website tersebut dapat diakses oleh jaringan publik saya menggunakan ngrok. **Maaf domain yang saya diberikan berbeda dengan domain pada gambar karena koneksi internet kadang error dan ketika direstart ngrok akan memberikan domain yang berbeda**. Jangan sungkan untuk menghubungi saya ketika website tidak dapat diakses, saya akan memberikan update url terbaru :)<br>
https://16be-182-253-250-99.ngrok.io/ <br>
![image](https://user-images.githubusercontent.com/52058660/131087118-c0ad8587-422a-4724-891b-6e2b4a30e18a.png)


## Security
### Code
- **Input validasi karakter**
  - trim($data) , menghapus newline `\n`/`\r`, tab `\t` dan extraspace 
  - stripslashes($data) , menghapus slash `\`
  - htmlspecialchars($data) , mengkonversikan predefined characters menjadi HTML entities, contoh: `<` menjadi `&lt;`<br>
![image](https://user-images.githubusercontent.com/52058660/131080651-89f3b9a1-591d-46fc-ba21-d94ba1f44bcc.png)<br>
- **Input validasi hanya angka**, sistem hanya menerima input integer atau float.<br>
![image](https://user-images.githubusercontent.com/52058660/131271844-25cdb810-612e-4ece-ba06-e5dfff4ad4eb.png)


### Web Server Software
- **ModSecurity**<br>
  Mengkonfigurasi web application firewall (WAF) ModSecurity ke web server menggunakan OWASP CRS sebagai rulesnya. Dengan adanya WAF, kita dapat mencegah web server terkena serangan web attack seperti sql-injection, XSS , CSRF dll.<br>
  ![image](https://user-images.githubusercontent.com/52058660/131086573-536d0215-4b30-4c68-bf65-1db34956a5e2.png)<br>
  Setelah implementasi waf, serangan akan diblock.<br>
  <img width="844" alt="gambar" src="https://user-images.githubusercontent.com/52058660/131095570-9fa82bc5-b706-4406-a191-cebb199d39b1.png"><br>
  jika anda memiliki SIEM, forward log ini ke SIEM anda untuk di analisa dan lakukan automasi alert.<br>
  ![image](https://user-images.githubusercontent.com/52058660/131097860-997d98b4-3d42-4557-aa97-6f5ed16dfa51.png)

- **Fail2ban**<br>
  Fail2ban berfungsi untuk mem-banned (blacklist) ip tertentu secara otomatis. Fungsi blacklist ip akan aktif jika ip masuk kedalam kriteria rules yang ada pada fail2ban. Penggunaan rules disesuaikan dengan service apa yang kita gunakan. Karena proyek ini menggunakan apache dan ModSecurity, maka digunakan rules seperti gambar dibawah ini.<br>
![image](https://user-images.githubusercontent.com/52058660/131128649-225e1979-a318-41b4-8730-cb01b7aec98a.png)<br>
Rules pertama berfungsi untuk mendeteksi login failure pada apache, jika terdapat ip yang gagal login lebih dari 6 kali dalam kurun waktu 5 menit maka ip tersebut akan di banned selama 10 menit. Rules kedua mengkombinasikan fungsi deteksi serangan pada ModSecurity dan fungsi banned IP pada fail2ban seperti IPS dan IDS. Sama seperti rules pertama, jika terdapat 6 kali deteksi vulnerability pada ip tertentu dalam kurun waktu 5 menit maka ip tersebut akan di banned selama 10 menit juga.
  
- **Setting SSL (self-signed)**<br>
  SSL berfungsi untuk meng-encrypt data komunikasi antara client dan server. karena ini adalah proyek demo, saya hanya menggunakan self-signed certificate. Namun untuk proyek skala enterprise diharuskan menggunakan trusted CA sign SSL. Saya juga men-direct setiap request http (port 80) ke https (port 443).<br>
  ![image](https://user-images.githubusercontent.com/52058660/131086356-d5c4dad4-2c27-40af-bfc7-b8029e470d71.png)

- **Disable directory listing**<br>
  Secara default directory indexing aktif pada server apache2. Hal ini bisa terjadi jika server terdapat folder kosong dan itu sangat berbahaya karena hacker bisa melihat file dan folder apa saja yang ada pada server kita.<br>
  ![image](https://user-images.githubusercontent.com/52058660/131090109-ffa76931-24cb-4dde-886d-8a48cb5ac66a.png)
  
- **Menyebunyikan apache version**<br>
  Dengan menyembunyikan informasi mengenai server, kita bisa mencegah dan menyulitkan hacker melakukan reconnaissance terhadap server kita.<br>
  ![image](https://user-images.githubusercontent.com/52058660/131091665-c0e6b3e8-82fb-4f3d-ab2b-148b4105e8ee.png)<br>
  Setelah dilakukan hardenning<br>
  ![image](https://user-images.githubusercontent.com/52058660/131092467-1cf00320-348b-47a7-bdb8-71ac10e2851a.png)

- **Security Header**<br>
![image](https://user-images.githubusercontent.com/52058660/131203250-31c0b1c5-538a-4cd6-a1b3-1aa56696e377.png)<br>
![image](https://user-images.githubusercontent.com/52058660/131203329-4089afcb-c68e-4aaa-ba7b-6f51676ffc84.png)<br>
  - **HTTP Strict Transport Security (HSTS)**, membatasi interaksi website hanya dengan HTTPS tidak dengan HTTP. Berfungsi untuk mencegah cookie hijacking
  - **Content-Security-Policy**, aturan yang mengatur resource apa yang boleh di ambil atau di eksekusi dalam web page. Salah satu fungsinya bisa mencegah XSS
  - **X-Frame-Options**, berfungsi untuk mencegah clickjancking. Browser tidak aka meload website lain dalam frame
  - **X-Content-Type-Options**, Mencegah content sniffing atau MIME sniffing<br>

  
### Server
- **Menambahkan SSH public key**<br>
  Nonaktifkan form login pada ssh, sebagai gantinya gunakan ssh public key untuk proses login. Hal ini berfungsi untuk mencegah brute force attack. Ubah konfigurasi file vim /etc/ssh/sshd_config<br>
  ```
  ChallengeResponseAuthentication no
  PasswordAuthentication no
  PermitRootLogin no
  ```
  ![image](https://user-images.githubusercontent.com/52058660/131098524-50f0a26d-3c82-48b5-8487-49c6b54e4b7b.png)

- **Setting ufw**<br>
  Hanya aktifkan service / port yang akan digunakan selama operasional, tutup service yang tidak perlu.
  ![image](https://user-images.githubusercontent.com/52058660/131093255-3d97d7be-0e10-491e-b063-3ea4a79c56f6.png)


## Ask Me!
acvn on [Twitter](https://twitter.com/aldi__satria) or [Instagram](https://www.instagram.com/aldi___satria/)

















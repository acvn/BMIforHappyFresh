# Kalkulator BMI
Kalkulator BMI (body-mass index) adalah sebuah program yang menghitung indeks masa tubuh dan mengecek apakah berat badan Anda ideal atau tidak. Rumus yang digunakan untuk menghitung BMI adalah:

<p align="center"><img src="https://user-images.githubusercontent.com/52058660/131056213-14128e17-3e25-458b-b21d-4eba5b19703f.png"></p>

Nilai dari hasil perhitungan BMI akan dikelompokkan menjadi 3 label berikut:<br>
- Underweight (BMI <= 18,4)
- Normal (18,4 <= BMI <= 24,9)
- Overweight (BMI >= 25)

## Cara Penggunaan
Kunjungi link berikut ini, https://3209-182-253-250-108.ngrok.io/ . Anda cukup memasukkan nilai berat badan dalam satuan Kg dan nilai tinggi badan dalam satuan cm , lalu tekan tombol hitung. program akan otomatis menghitung nilai BMI anda dan menampikan dan format json. <br><br>
**Contoh:**<br>
Misalkan anda memiliki berat 70 kg dan tinggi 180 cm.<br><br>
<img width="745" alt="gambar" src="https://user-images.githubusercontent.com/52058660/131071412-37543785-46d1-4079-a005-568408d4519b.png"><br>

Setelah menekan tombol hitung, program akan menghasilkan output dalam format json. Dapat dilihat pada gambar dibawah outputnya adalah nilai bmi 21,6 dan label bmi "normal".<br><br>
<img width="743" alt="gambar" src="https://user-images.githubusercontent.com/52058660/131071519-3062a1e5-1d3f-4dc1-af8f-0982e7eff359.png"><br>

## Teknologi
- HTML dan CSS - Front-end
- PHP - Back-emd
- MySQL - Database
- Apache2 - Web server
- ModSecurity - Web application firewall (WAF)
- Fail2ban - IPS

## Deployment
- Ngrok<br>
Untuk proyek ini saya mendeploy programnya pada VM lokal. Agar website tersebut dapat diakses oleh jaringan publik saya menggunakan ngrok. Jangan sungkan untuk menghubungi saya ketika website tidak dapat diakses, karena ngrok memiliki limit dalam pengoperasiannya :)<br>
![image](https://user-images.githubusercontent.com/52058660/131087118-c0ad8587-422a-4724-891b-6e2b4a30e18a.png)


## Security
### Code
- Input Validation
  - trim($data) , menghapus newline `\n`/`\r`, tab `\t` dan extraspace 
  - stripslashes($data) , menghapus slash `\`
  - htmlspecialchars($data) , mengkonversikan predefined characters menjadi HTML entities, contoh: `<` menjadi `&lt;`<br>
![image](https://user-images.githubusercontent.com/52058660/131080651-89f3b9a1-591d-46fc-ba21-d94ba1f44bcc.png)<br>


### Web Server
- ModSecurity<br>
  Mengkonfigurasi ModSecurity ke web server sebagai web application firewall (WAF) dan menggunakan OWASP CRS sebagai rulesnya.<br>
  ![image](https://user-images.githubusercontent.com/52058660/131086573-536d0215-4b30-4c68-bf65-1db34956a5e2.png)

- Fail2band
- Setting SSL (self-signed)<br>
  SSL berfungsi untuk meng-encrypt data komunikasi antara client dan server. karena ini adalah proyek demo, saya hanya menggunakan self-signed certificate. Namun untuk proyek skala enterprise diharuskan menggunakan trusted CA sign SSL. Saya juga men-direct setiap request http (port 80) ke https (port 443).<br>
  ![image](https://user-images.githubusercontent.com/52058660/131086356-d5c4dad4-2c27-40af-bfc7-b8029e470d71.png)

  
- Disable directory listing
- Menyebunyikan apache version
### Serve
- Menambahkan SSH public key
- Setting ufw

## Ask Me!
acvn on [Twitter](https://twitter.com/aldi__satria) or [Instagram](https://www.instagram.com/aldi___satria/)

















# Kalkulator BMI
Kalkulator BMI (body-mass index) adalah sebuah program yang memeriksa indeks masa tubuh dan mengecek apakah berat badan Anda ideal atau tidak. Rumus yang digunakan untuk menghitung BMI adalah:

<p align="center"><img src="https://user-images.githubusercontent.com/52058660/131056213-14128e17-3e25-458b-b21d-4eba5b19703f.png"></p>

Nilai dari hasil perhitungan BMI akan dikelompokkan menjadi 3 label berikut:<br>
- Underweight (BMI <= 18,4)
- Normal (18,4 <= BMI <= 24,9)
- Overweight (BMI >= 25)

## Cara Penggunaan
Kunjungi link berikut ini, https://3209-182-253-250-108.ngrok.io/ . Anda cukup memasukkan nilai berat badan dalam satuan Kg dan nilai tinggi badan dalam satuan cm , lalu tekan tombol hitung. program akan otomatis menghitung nilai BMI anda dan menampikan dan format json. <br><br>
**Contoh:**<br>
Misalkan anda memiliki berat 70 kg dan tinggi 180 cm.<br>
<img width="745" alt="gambar" src="https://user-images.githubusercontent.com/52058660/131059592-4f98ffba-108d-4452-b276-7e14d1763a04.png"><br>
Setelah menekan tombol hitung, program akan menghasilkan output dalam format json. Dapat dilihat pada gambar dibawah outputnya adalah nilai bmi 21,6 dan label bmi .normal".<br>
<img width="833" alt="gambar" src="https://user-images.githubusercontent.com/52058660/131059709-7e98dc0b-9b95-4665-887d-277de33644ce.png"><br>


## Teknologi
- HTML dan CSS
- PHP
- MySQL
- Apache2
- ModSecurity
- Fail2ban

## Deployment
- Ngrok

## Security
### Code
- Input Validation
### Web Server
- ModSecurity
- Fail2band
- Setting SSL
- Disable directory listing
- Menyebunyikan apache version
### Serve
- Menambahkan SSH public key
- Setting ufw


















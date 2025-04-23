const suratForm = document.getElementById("suratForm");
const suratContainer = document.getElementById("suratContainer");

function formatDate(dateString) {
    const [year, month, day] = dateString.split('-');
    return `${day.padStart(2, '0')}.${month.padStart(2, '0')}.${year}`;
}



suratForm.addEventListener("submit", (event) => {
  event.preventDefault();
  const logoInput = document.getElementById("logoInput");
  const penerima = document.getElementById("penerima").value;
  const alamatPengirim = document.getElementById("alamatPengirim").value;
  const noPolisi = document.getElementById("noPolisi").value;
  const shipmentNo = document.getElementById("shipmentNo").value;
  const namaPengemudi = document.getElementById("namaPengemudi").value;
  const pembeli = document.getElementById("pembeli").value;
  const tujuan = document.getElementById("tujuan").value;
  const produk = document.getElementById("produk").value;
  const noSoSa = document.getElementById("noSoSa").value;
  const noDo = document.getElementById("noDo").value;
  const jmlPemesanan = document.getElementById("jmlPemesanan").value;
  const density = document.getElementById("density").value;
  const tglPengiriman = this.formatDate(document.getElementById("tglPengiriman").value);
  const jamKeluar = document.getElementById("jamKeluar").value;
  const noSegel = document.getElementById("noSegel").value;

  let logoDataUrl = "";

  if (logoInput.files.length > 0) {
    const file = logoInput.files[0];
    const reader = new FileReader();

    reader.onload = function (e) {
      logoDataUrl = e.target.result;
      generateSurat();
    };

    reader.readAsDataURL(file);
  } else {
    generateSurat();
  }

  function generateSurat(){
      const suratTemplate = `
        <div style="padding: 40px 0;">
            <div style="width: 100%;display: flex; flex-direction: column; justify-content: center; align-item: center;">
                <div style="width: 86%; margin: 0 auto;">
                    <div style="display: flex; justify-content: space-between; align-item: center;">
                        <div>Untuk ${penerima}</div>
                        <div style="margin-top: -12px;">${
                            logoDataUrl
                            ? `<img src="${logoDataUrl}" alt="Logo" style="width: 200px; height: 80px;">`
                            : "Logo"
                        }</div>
                    </div>
                </div>
                <div style="width: 86%; margin:24px auto;">
                <p style="width: 35%;">${alamatPengirim}</p>
                </div>
            </div>
    
            <div style="width: 100%; display: flex; flex-direction: column; justify-content: center; align-item: center">
                <h2 style="margin: 0 auto; ;text-align: center; border-bottom: 1px solid black; font-size: 20px; justify-content: center;">SURAT PENGANTAR PENGIRIMAN</h2>
                <div style="margin: 24px auto;">
                <table style="width: 680px; border: none; font-size: 15px;">
                    <tr>
                        <td style="text-transform: uppercase; padding: 0 2px;">no polisi/nama kapal</td>
                        <td style="text-transform: uppercase; padding: 0 23px;">:  ${noPolisi}</td>
                    </tr>
                    <tr>
                        <td style="text-transform: uppercase; padding: 0 2px;">shipment no</td>
                        <td style="text-transform: uppercase; padding: 0 23px;">: ${shipmentNo}</td>
                    </tr>
                    <tr>
                        <td style="text-transform: uppercase; padding: 0 2px;">nama pengemudi</td>
                        <td style="text-transform: uppercase; padding: 0 23px;">: ${namaPengemudi}</td>
                    </tr>
                    <tr>
                        <td style="text-transform: uppercase; padding: 0 2px;">pembeli</td>
                        <td style="text-transform: uppercase; padding: 0 23px;">: ${pembeli}</td>
                    </tr>
                    <tr>
                        <td style="text-transform: uppercase; padding: 0 2px;">tujuan</td>
                        <td style="width: 60%;text-transform: uppercase; padding: 0 26px; white-space: pre-wrap;">: ${tujuan}</td>
                    </tr>
                    <tr>
                        <td style="text-transform: uppercase; padding: 0 2px;">produk</td>
                        <td style="text-transform: uppercase; padding: 0 23px;">: <b> ${produk}</b></td>
                    </tr>
                    <tr>
                        <td style="text-transform: uppercase; padding: 0 2px;">nomor so/sa</td>
                        <td style="text-transform: uppercase; padding: 0 23px;">: ${noSoSa}</td>
                    </tr>
                    <tr>
                        <td style="text-transform: uppercase; padding: 0 2px;">nomor do</td>
                        <td style="text-transform: uppercase; padding: 0 23px;">: ${noDo}</td>
                    </tr>
                    <tr>
                        <td style="text-transform: uppercase; padding: 0 2px;">jml pemesanan</td>
                        <td style="text-transform: uppercase; padding: 0 23px;">: ${jmlPemesanan}</td>
                    </tr>
                    <tr>
                        <td style="text-transform: uppercase; padding: 0 2px;">density & temp (obs)</td>
                        <td style="text-transform: uppercase; padding: 0 23px;">: ${density}</td>
                    </tr>
                    <tr>
                        <td style="text-transform: uppercase; padding: 0 2px;">tgl pengiriman</td>
                        <td style="text-transform: uppercase; padding: 0 23px;">: ${tglPengiriman}</td>
                    </tr>
                    <tr>
                        <td style="text-transform: uppercase; padding: 0 2px;">jam keluar</td>
                        <td style="text-transform: uppercase; padding: 0 23px;">: ${jamKeluar}</td>
                    </tr>
                    <tr>
                        <td style="text-transform: uppercase; padding: 0 2px;">nomor segel</td>
                        <td style="text-transform: uppercase; padding: 0 23px;">: ${noSegel}</td>
                    </tr>
                    </table>
                    <div>
                        <div style="text-transform: uppercase; padding: 0 2px; margin-top: 30px; ">
                            <h2 style="width: 50%; text-align: left; font-size: 16px; border-bottom: 1px solid black;">harus diisi oleh petugas lapangan</h2>
                            <table style="width: 680px; border: none; font-size: 15px;">
                                <tr>
                                    <td style="text-transform: uppercase; padding: 0 2px;">jam tiba</td>
                                    <td style="text-transform: uppercase;">: </td>
                                </tr>
                                <tr>
                                    <td style="text-transform: uppercase; padding: 0 2px;">stock diterima</td>
                                    <td style="text-transform: uppercase;">: </td>
                                </tr>
                                                        <tr>
                                    <td style="text-transform: uppercase; padding: 0 2px;">density & temp (obs)</td>
                                    <td style="text-transform: uppercase;">: <div style="width: 240px;"></div> </td>
                                </tr>
                                                        <tr>
                                    <td style="text-transform: uppercase;">order berikutnya</td>
                                    <td style="text-transform: uppercase;">:  </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-top: 40px;">
                        <div style="content: '';"></div>
                        <div style="text-transform: uppercase; width: 50%; text-align: center; font-size: 16px;">
                        <h4 >
                            tanda tangan dan nama lengkap pelanggan
                        </h4>
                        <p style="margin-top: 80px;">(.............................................................)</p>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-top: 24px;">
                    <div id="barcode" ></div> 
                </div>
            </div>
        </div>
        `;
    suratContainer.innerHTML = suratTemplate;
    new QRCode(document.getElementById("barcode"), {
    text:
        "0000" +
        pembeli.toString() +
        "|" +
        noSoSa +
        "|" +
        noDo +
        "|" +
        produk +
        "|" +
        jmlPemesanan +
        "|" +
        "Instalasi Medan Group" +
        "|" +
        noPolisi.toUpperCase() +
        "|" +
        tglPengiriman + '/',
    width: 200,
    height: 200,
    colorDark: "#000000",
    colorLight: "#ffffff",
    correctLevel: QRCode.CorrectLevel.H,
    });
  }


});

const elementHTML = document.getElementById("suratContainer");

// Fungsi untuk mengunduh PDF
async function downloadPDF() {
  // Membuat objek jsPDF
  const { jsPDF } = window.jspdf;

  // Cek apakah jsPDF tersedia
  if (!jsPDF) {
    console.error("jsPDF is not defined");
    return;
  }

  try {
    // Tangkap elemen sebagai gambar
    const canvas = await html2canvas(elementHTML, {
      scale: 1.5, // meningkatkan kualitas gambar
      useCORS: true, // menggunakan CORS untuk gambar yang diambil dari domain lain
      backgroundColor: "#ffffff", // memastikan latar belakang putih
    });
    const imgData = canvas.toDataURL("image/png");

    // Buat instance jsPDF
    const doc = new jsPDF({
      orientation: "p", // Portrait
      unit: "mm",
      format: "a4",
    });

    // Ukuran halaman A4 dalam mm
    const pageWidth = doc.internal.pageSize.getWidth();
    const pageHeight = doc.internal.pageSize.getHeight();

    // Posisi gambar dan ukuran yang disesuaikan dengan ukuran halaman
    const imgWidth = pageWidth - 10; // Margin 5mm di kiri dan kanan
    const imgHeight = (canvas.height * imgWidth) / canvas.width; // Sesuaikan rasio

    // Tambahkan gambar ke PDF
    doc.addImage(imgData, "PNG", 10, 10, imgWidth, imgHeight);

    const noDoTitle = document.getElementById("noDo").value;
    const namaPengemudiTitle = document.getElementById("namaPengemudi").value;


    // Simpan PDF
    doc.save(noDoTitle + namaPengemudiTitle + new Date().toLocaleDateString() + "surat.pdf");
  } catch (error) {
    console.error("Error capturing element:", error);
  }
}

// Menambahkan event listener ke tombol unduh
const downloadBtn = document.getElementById("downloadBtn");
downloadBtn.addEventListener("click", downloadPDF);

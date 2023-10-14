const data = [
  {
    content : `
      <h2 class="mb-3">Sistem Pendukung Keputusan</h2>
      <p class="text-justify">Sistem pendukung keputusan adalah suatu sistem informasi spesifik yang ditujukan untuk membantu manajemen dalam mengambil keputusan yang berkaitan dengan persoalan yang bersifat semi terstruktur. Sistem ini memiliki fasilitas untuk menghasilkan berbagai alternatif yang secara interaktif digunakan oleh pemakai.</p>
    `,
    // image : 'images/homepage/content/spk-content.svg',
    image : 'images/homepage/icons/spk.png',
    alt : 'Logo Content SPK'
  },
  {
    content : `
      <h2 class="mb-3">Metode SMART</h2>
      <p class="text-justify">Metode <i>Simple Multi Attribute Rating Technique</i> (SMART) adalah suatu pendekatan yang digunakan untuk membuat tujuan atau target yang spesifik, terukur, dapat dicapai, relevan, dan memiliki batas waktu yang jelas. Metode ini biasa digunakan dalam berbagai konteks, baik dalam lingkup pribadi, organisasi, maupun proyek.</p>
    `,
    // image : 'images/homepage/content/method-content.svg',
    image : 'images/homepage/icons/method.png',
    alt : 'Logo Content Metode'
  },
  {
    content : `
      <h2 class="mb-3">Objek Wisata</h2>
      <p class="text-justify">Objek wisata adalah suatu tempat atau area yang menarik minat wisatawan untuk dikunjungi karena memiliki daya tarik atau keunikan tertentu, seperti keindahan alam, situs sejarah, budaya lokal, kegiatan rekreasi, kuliner khas, dan lain sebagainya. Objek wisata dapat berupa destinasi wisata yang terkenal dan populer, seperti taman nasional, pantai, gunung, atau kota wisata, namun juga bisa berupa objek wisata lokal yang kurang dikenal tetapi memiliki daya tarik khusus yang menarik wisatawan untuk berkunjung. </p>
      <p class="text-justify">Objek wisata sering kali dijaga dan dirawat agar dapat terus memberikan pengalaman dan kepuasan yang baik bagi para wisatawan yang datang berkunjung.</p>
    `,
    // image : 'images/homepage/content/saham-content.svg',
    image : 'images/homepage/icons/waterfall_1.png',
    alt : 'Logo Content Saham'
  },
  {
    content : `
      <h2 class="mb-3">Wisata Alam Air Terjun</h2>
      <p class="text-justify">Wisata alam air terjun adalah salah satu jenis objek wisata alam yang populer di seluruh dunia. Air terjun terbentuk karena air mengalir melewati tebing-tebing atau bebatuan dan jatuh dengan ketinggian tertentu sehingga menghasilkan suara gemuruh dan pemandangan yang indah.</p>
      <p class="text-justify">Di Kabupaten Serang Banten, terdapat banyak wisata alam air terjun yang menarik untuk dikunjungi, seperti Air Terjun Cigumawang, Air Terjun Goong, dan masih banyak yang lainnya. Wisata alam air terjun menawarkan pengalaman yang menenangkan dan menyegarkan, serta dapat menjadi sarana rekreasi yang menyenangkan bagi para wisatawan yang mencari keindahan alam dan kesegaran udara.</p>
    `,
    // image : 'images/homepage/content/jii-content.svg',
    image : 'images/homepage/icons/waterfall.png',
    alt : 'Logo Content JII 70'
  },
];

function selectedMenu(key) {
  const BASE_URL = window.location.origin;
  const contentText = document.querySelector('.dynamic-content-text');
  const contentImage = document.querySelector('.dynamic-content-image');

  const selectedData = data[key];

  contentText.innerHTML = selectedData.content;
  contentImage.innerHTML = `<img src="${BASE_URL}/${selectedData.image}" alt="${selectedData.alt}" class="img-fluid">`;
}

const searchInput = document.getElementById("searchInput");
const searchResults = document.getElementById("searchResults");
const otherdiv = document.getElementById("otherdiv");

searchInput.addEventListener("input", handleSearch);

async function handleSearch(e) {
    try {
        const query = e.target.value;
        const data = await fetchData(query);
        updateResults(data);
    } catch (error) {
        console.error(error);
    }
}

async function fetchData(query) {
    const response = await fetch("search?q=" + encodeURIComponent(query));
    if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
    }
    return response.text();
}

function updateResults(data) {
    const results = JSON.parse(data);

    searchResults.innerHTML = "";
    otherdiv.style.display = "none";

    results.forEach((item) => {
                const card = document.createElement("div");
                card.className = "col-lg-3 col-md-4";
                card.innerHTML = `
        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
          <a href="wiki_details?id=${btoa(item.id)}">
            ${
              item.image
                ? `<img src="/Wiki/public/img/gallery/${item.image}" alt="" class="img-fluid">`
                : '<h1 class="message">Wait till Wikis Team Accept Your Wiki</h1>'
            }
          </a>
          <p class="title">${item.title}</p>
          <p class="sub">${item.category_name}</p>
        </div>
      `;
    searchResults.appendChild(card);
  });
}
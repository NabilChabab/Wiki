const searchInput = document.getElementById("searchInput");
const searchDiv = document.getElementById("searchResults");
const otherdiv = document.getElementById("otherdiv");

searchInput.addEventListener("input", async (e) => {
  try {
    const query = e.target.value;
    const response = await fetch(`search?q=${encodeURIComponent(query)}`);
    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    const results = await response.json();

    searchDiv.innerHTML = "";
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
      searchDiv.appendChild(card);
    });
  } catch (error) {
    console.error(error);
  }
});

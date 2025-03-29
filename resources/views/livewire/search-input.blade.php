<!--search-input.blade.php -->
<div class="relative w-32 transition-all">
  <input
      type="text"
      placeholder="Search.."
      id="searchInput"
      class="w-full quicksand text-sm py-2 pl-10 pr-4 text-black bg-transparent border rounded-lg outline-none transition-all border-gray-600"
      autocomplete="off"
  />
  <div class="absolute inset-y-0 left-0 flex items-center pl-3">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
      </svg>
  </div>
  <!-- Loading Spinner -->
  <div id="loadingSpinner" class="absolute inset-y-0 right-0 flex items-center pr-3 hidden">
      <svg class="animate-spin h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
      </svg>
  </div>
  <!-- Search Suggestions -->
  <ul id="searchResults" class="absolute w-full bg-white border border-gray-300 rounded-lg shadow-lg mt-1 hidden max-h-56 overflow-auto z-50"></ul>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
      const searchInput = document.getElementById("searchInput");
      const searchResults = document.getElementById("searchResults");
      const searchContainer = searchInput.parentElement;
      const searchIcon = searchContainer.querySelector("svg");
      const loadingSpinner = document.getElementById("loadingSpinner");

      let debounceTimer;

      searchInput.addEventListener("focus", () => {
          searchContainer.classList.add("w-80", "bg-transparent");
          searchContainer.classList.remove("w-32");
          searchInput.placeholder = "Enter your key here ↵";
          searchInput.classList.add("border-blue-500");
          searchInput.classList.remove("border-gray-500");
          searchIcon.classList.add("text-blue-500");
          searchIcon.classList.remove("text-gray-400");
      });

      searchInput.addEventListener("blur", () => {
          setTimeout(() => searchResults.classList.add("hidden"), 200);
          searchContainer.classList.add("w-32");
          searchContainer.classList.remove("w-80", "bg-transparent");
          searchInput.placeholder = "Find..";
          searchInput.classList.add("border-gray-500");
          searchInput.classList.remove("border-blue-500");
          searchIcon.classList.add("text-gray-600");
          searchIcon.classList.remove("text-blue-500");
      });

      searchInput.addEventListener("input", function () {
          clearTimeout(debounceTimer);
          const query = searchInput.value.trim();

          if (query.length < 2) {
              searchResults.innerHTML = "";
              searchResults.classList.add("hidden");
              loadingSpinner.classList.add("hidden");
              return;
          }

          // Show loading spinner
          loadingSpinner.classList.remove("hidden");
          searchIcon.classList.add("hidden");

          debounceTimer = setTimeout(() => {
            fetch("{{ route('services.search') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                },
                body: JSON.stringify({ search: query }),
            })
              .then(response => response.json())
              .then(data => {
                  searchResults.innerHTML = "";
                  if (data.data.length > 0) {
                      searchResults.classList.remove("hidden");
                      data.data.forEach(service => {
                          let item = document.createElement("li");
                          item.classList.add("p-2", "cursor-pointer", "hover:bg-gray-200", "border-b");
                          item.textContent = service.name;
                          item.dataset.url = `/services#${service.slug}`;

                          item.addEventListener("click", () => {
                              window.location.href = item.dataset.url;
                              smoothScrollToSection(service.slug);
                          });

                          searchResults.appendChild(item);
                      });
                  } else {
                      searchResults.classList.add("hidden");
                  }
              })
              .catch(error => console.error("Error fetching search results:", error))
              .finally(() => {
                  // Hide loading spinner and show search icon
                  loadingSpinner.classList.add("hidden");
                  searchIcon.classList.remove("hidden");
              });
          }, 300);
      });

      searchInput.addEventListener("keydown", function (event) {
          if (event.key === "Enter") {
              event.preventDefault();
              const firstResult = searchResults.querySelector("li");
              if (firstResult) {
                  window.location.href = firstResult.dataset.url;
                  smoothScrollToSection(firstResult.dataset.url.split("#")[1]);
              }
          }
      });

      function smoothScrollToSection(sectionId) {
          setTimeout(() => {
              const targetSection = document.getElementById(sectionId);
              if (targetSection) {
                  targetSection.scrollIntoView({ behavior: "smooth", block: "start" });
              }
          }, 300);
      }
  });
</script>


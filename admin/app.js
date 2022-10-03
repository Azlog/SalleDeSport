const charactersList = document.getElementById('charactersList');
const searchBar = document.getElementById('searchBar');
let hpCharacters = [];

searchBar.addEventListener('keyup', (e) => {
    const searchString = e.target.value.toLowerCase();

    const filteredCharacters = hpCharacters.filter((character) => {
        return (
            character.padresse.toLowerCase().includes(searchString) ||
            character.ptelephone.toLowerCase().includes(searchString)||
            character.pemail.toLowerCase().includes(searchString)
        );
    });
    console.log(filteredCharacters);
    displayCharacters(filteredCharacters);
});

const loadCharacters = async () => {
    try {
        const res = await fetch('https://sportingclubdemarly.fr/admin/recherche_partenaires.php');
        hpCharacters = await res.json();
        displayCharacters(hpCharacters);
    } catch (err) {
        document.getElementById("charactersList").innerHTML = err.message;
}
};

const displayCharacters = (characters) => {
    const htmlString = characters
        .map((character) => {
            return `
            <div class="container py-4 py-xl-5 mt-5 bg-light border border-dark text-dark" style="border-radius: 16px;">
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col d-flex flex-column justify-content-center p-5">
                    <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                        <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-house">
                                <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"></path>
                                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"></path>
                            </svg></div>
                        <div>
                            <h4>Adresse</h4>
                            <p>${character.padresse}</p>
                        </div>
                    </div>
                    <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                        <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-phone">
                                <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"></path>
                                <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"></path>
                            </svg></div>
                        <div>
                            <h4>Téléphone</h4>
                            <p>${character.ptelephone}</p>
                        </div>
                    </div>
                    <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start">
                        <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-laptop">
                                <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z"></path>
                            </svg></div>
                        <div>
                            <h4>Adresse mail</h4>
                            <p>${character.pemail}</p>
                        </div>
                    </div>
                    <div class="col-md-12 mt-5"><button class="btn btn-secondary" onclick="location.href = 'partenaire.php?id=${character.id}'" style="width: 13rem; color: white"><h5 class="d-inline" style="color: white"><strong>Gerer les permissions</strong></h5></button></div>

                </div>
            </div>
        </div>
        <br>
        `;
        })
        .join('');
    charactersList.innerHTML = htmlString;
};

loadCharacters();
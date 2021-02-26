let userName = jQuery('span.username').html();
// ------------------------------------------
//  FETCH FUNCTIONS
// ------------------------------------------

function fetchData (url) {
    return fetch(url)
        .then(
            checkStatus
        ).then(
            response => response.json()
        ).catch(
            error => console.log('There was an error', error)
        );
}

Promise.all([
    fetchData(`https://teamtreehouse.com/${userName}.json`)
]).then ( data => {
    
    const treehouseJSON = data[0];

    jQuery('.loading-screen').remove();

    gatherUser(treehouseJSON);
    gatherPoints(treehouseJSON);
    gatherBadges(treehouseJSON);
});

function checkStatus(response) {
    if (response.ok) {
        return Promise.resolve(response);
    } else {
        return Promise.reject( new Error(response.statusText) );
    }
}

// ------------------------------------------
//  HELPER FUNCTIONS
// ------------------------------------------
const gatherUser = (data) => {

        let userName = data.name;
        let userImg = data.gravatar_url;
        let userURL = data.profile_url;
        let html = `<img src="${userImg}" loading="lazy"> <a href="${userURL}" target="_BLANK"><h2> ${userName}</h2></a>`;

        jQuery(".treehouse-portfolio-user").append(html);
}

const gatherPoints = (data) => {
        const treeHousePoints = data.points;
        let i = 0;
        for (const [key, value] of Object.entries(treeHousePoints).sort(([,a],[,b]) => b-a)) {
            let header;
            let list;

            if (i < 1 ) {
                header = `<div class="point-portfolio-container"> ${key} Points ${value} </div>`;
            } else {
                list = `<li> <strong>${key}</strong> <h4>${value}</h4> </li>`;
            }
            jQuery(".treehouse-portfolio-points-container h2").append(header);
            jQuery(".treehouse-portfolio-points-container ul").append(list);
            
            i++;
        }
    }

    const gatherBadges = (data) => {
        let badges = data.badges.reverse();

        for (i = 0; i < badges.length; i++ ) {
            let date = new Date(badges[i].earned_date);
            let newDate = date.toLocaleDateString();
            let courseTitle;
            
            if (badges[i].courses.length) {
                courseTitle = badges[i].courses[0].title;
            } else {
                courseTitle = "N/A";
            }

            let html = `
            <div class="treehouse-portfolio-badge">
                <div class="treehouse-portfolio-badge-content">
                    <strong>Achievement</strong>
                    <h3>${ badges[i].name }</h3>
                    <h4>${ courseTitle }</h4>
                    <div>
                        <strong>
                            Achieved
                        </strong>
                        <p>
                            ${ newDate }
                        </p>
                    </div>
                </div> 
                <div class="treehouse-portfolio-badge-image">
                    <img src="${badges[i].icon_url}" loading="lazy" /> 
                </div> 
            </div>`;

            jQuery(".treehouse-portfolio-badges").append(html);
        }
    }
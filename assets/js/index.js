function seemore(id) {
    var el = document.getElementById("seemore_" + id);
    var seemore_bt = document.getElementById("seemore_bt_" + id);

    if (el.classList.contains("active")) {
        // el.classList.remove("active");
        // seemore_bt.style.display = "block";
    }
    else {
        el.classList.add("active");
        seemore_bt.style.display = "none";
    }
}

function heinShare(shareData) {
    console.log(shareData);
    async () => {
        try {
            await navigator.share(shareData)
            // resultPara.textContent = 'MDN shared successfully'
        } catch (err) {
            // resultPara.textContent = 'Error: ' + err
        }
    }
}

function isDarkTheme(isDark = false) {
    if (isDark) {
        document.documentElement.style.setProperty('--bs-body-color', 'var(--dark-invert)');
        document.documentElement.style.setProperty('--bs-body-bg', 'var(--dark)');
        document.querySelector('.mapSvg').style.opacity = 1;
    } else {
        document.documentElement.style.setProperty('--bs-body-color', 'var(--dark)');
        document.documentElement.style.setProperty('--bs-body-bg', 'var(--dark-invert)');
        document.querySelector('.mapSvg').style.opacity = 0.2;

    }
}


function utcToLocal(time){
    let unix_timestamp = time;
    var date = new Date(unix_timestamp * 1000); // multiplied by 1000 so that the argument is in milliseconds, not seconds.
    var mL = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var mS = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    var y = date.getFullYear();
    var m = mS[date.getMonth()];
    var d = ("0" + date.getDate()).substr(-2);

    var hours = date.getHours();
        
    var ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = ("0" + (hours ? hours : 12)).substr(-2); // the hour '0' should be '12'
    var minutes = ("0" + date.getMinutes()).substr(-2);
    var seconds = "0" + date.getSeconds();

    // Will display time in 10:30:23 format
    // var formattedTime = d + '&nbsp;' + m + '&nbsp;' + y +" &nbsp;" +hours + ':' + minutes+ampm;
    var formattedTime = d + '&nbsp;' + m + '&nbsp;' + y ;

    // console.log(formattedTime);
    // var utcDate = unix_timestamp * 1000;
    // var localDate = new Date(utcDate);
    return formattedTime;

}


// document.addEventListener("DOMContentLoaded", function () {
//     var lazyloadImages = document.querySelectorAll("img");
//     var lazyloadThrottleTimeout;

//     function lazyload() {
//         if (lazyloadThrottleTimeout) {
//             clearTimeout(lazyloadThrottleTimeout);
//         }

//         lazyloadThrottleTimeout = setTimeout(function () {
//             var scrollTop = window.pageYOffset;
//             lazyloadImages.forEach(function (img) {
//                 if (img.offsetTop < (window.innerHeight + scrollTop)) {
//                     img.src = img.dataset.src;
//                     img.classList.remove('lazy');
//                 }
//             });
//             if (lazyloadImages.length == 0) {
//                 document.removeEventListener("scroll", lazyload);
//                 window.removeEventListener("resize", lazyload);
//                 window.removeEventListener("orientationChange", lazyload);
//             }
//         }, 20);
//     }

//     document.addEventListener("scroll", lazyload);
//     window.addEventListener("resize", lazyload);
//     window.addEventListener("orientationChange", lazyload);
// });

// (function () {

//   const quotesEl = document.querySelector('.quotes');
//   const loaderEl = document.querySelector('.loader');

//   // get the quotes from API
//   const getQuotes = async (page, limit) => {
//       const API_URL = `https://api.javascripttutorial.net/v1/quotes/?page=${page}&limit=${limit}`;
//       const response = await fetch(API_URL);
//       // handle 404
//       if (!response.ok) {
//           throw new Error(`An error occurred: ${response.status}`);
//       }
//       return await response.json();
//   }

//   // show the quotes
//   const showQuotes = (quotes) => {
//       quotes.forEach(quote => {
//           const quoteEl = document.createElement('blockquote');
//           quoteEl.classList.add('quote');

//           quoteEl.innerHTML = `
//           <span>${quote.id})</span>
//           ${quote.quote}
//           <footer>${quote.author}</footer>
//       `;

//           quotesEl.appendChild(quoteEl);
//       });
//   };

//   const hideLoader = () => {
//       loaderEl.classList.remove('show');
//   };

//   const showLoader = () => {
//       loaderEl.classList.add('show');
//   };

//   const hasMoreQuotes = (page, limit, total) => {
//       const startIndex = (page - 1) * limit + 1;
//       return total === 0 || startIndex < total;
//   };

//   // load quotes
//   const loadQuotes = async (page, limit) => {

//       // show the loader
//       showLoader();

//       // 0.5 second later
//       setTimeout(async () => {
//           try {
//               // if having more quotes to fetch
//               if (hasMoreQuotes(page, limit, total)) {
//                   // call the API to get quotes
//                   const response = await getQuotes(page, limit);
//                   // show quotes
//                   showQuotes(response.data);
//                   // update the total
//                   total = response.total;
//               }
//           } catch (error) {
//               console.log(error.message);
//           } finally {
//               hideLoader();
//           }
//       }, 500);

//   };

//   // control variables
//   let currentPage = 1;
//   const limit = 10;
//   let total = 0;


//   window.addEventListener('scroll', () => {
//       const {
//           scrollTop,
//           scrollHeight,
//           clientHeight
//       } = document.documentElement;

//       if (scrollTop + clientHeight >= scrollHeight - 5 &&
//           hasMoreQuotes(currentPage, limit, total)) {
//           currentPage++;
//           loadQuotes(currentPage, limit);
//       }
//   }, {
//       passive: true
//   });

//   // initialize
//   loadQuotes(currentPage, limit);

// })();

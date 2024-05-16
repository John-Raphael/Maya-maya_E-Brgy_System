<!DOCTYPE html>
<style>
  @media print {
      @page {
	  size: portrait;
      }
      @page rotated {
	  page-orientation: rotate-left;
      }
      div {
	  overflow: hidden;
      }
      body {
	  margin: 0;
	  font-size: 2em;
      }
      .landscape {
	  page: rotated;
	  transform-origin: top left;
	  transform: translateX(100vw) rotate(90deg);
	  width: 100vh;
	  height: 100vw;
      }
  }
</style>
<div>
  <h1>Portrait page.</h1>
  <p>Tenderloin ham boudin tongue sausage venison short ribs sirloin,
    kielbasa beef ribs. Strip steak shank bresaola salami spare ribs
    kielbasa fatback, cow t-bone flank leberkas sirloin. Jowl pork
    belly ribeye, corned beef sirloin chicken salami tail. Rump swine
    ham shank corned beef short loin, speck turkey pancetta shankle
    frankfurter. Pancetta tail fatback, ground round brisket biltong
    frankfurter turkey. Ham hock chicken strip steak, salami short
    ribs beef ribs pork sirloin pastrami pork loin turducken rump
    brisket andouille.</p>
</div>
<div class="landscape">
  <h1>Landscape page.</h1>
  <p>Tenderloin ham boudin tongue sausage venison short ribs sirloin,
    kielbasa beef ribs. Strip steak shank bresaola salami spare ribs
    kielbasa fatback, cow t-bone flank leberkas sirloin. Jowl pork
    belly ribeye, corned beef sirloin chicken salami tail. Rump swine
    ham shank corned beef short loin, speck turkey pancetta shankle
    frankfurter. Pancetta tail fatback, ground round brisket biltong
    frankfurter turkey. Ham hock chicken strip steak, salami short
    ribs beef ribs pork sirloin pastrami pork loin turducken rump
    brisket andouille.</p>
</div>
<div>
  <h1>Portrait page again.</h1>
  <p>Tenderloin ham boudin tongue sausage venison short ribs sirloin,
    kielbasa beef ribs. Strip steak shank bresaola salami spare ribs
    kielbasa fatback, cow t-bone flank leberkas sirloin. Jowl pork
    belly ribeye, corned beef sirloin chicken salami tail. Rump swine
    ham shank corned beef short loin, speck turkey pancetta shankle
    frankfurter. Pancetta tail fatback, ground round brisket biltong
    frankfurter turkey. Ham hock chicken strip steak, salami short
    ribs beef ribs pork sirloin pastrami pork loin turducken rump
    brisket andouille.</p>
</div>
</html>
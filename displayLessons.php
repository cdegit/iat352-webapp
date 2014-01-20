<?php

// Displays lessons based on a particular sort
// Also displays the sorting menu
// Most of this functionality has yet to be implemented; for now, it's just a placeholder to show how things will work 
function displayLessons($sort) {
	?>

	<article id="displayLessons">
		<div id="lessonSort">
			<ul>
				<li class="topicCategory">Languages
					<ul class="dropdownTopics">
						<li>Python</li>
						<li>C</li>
						<li>C++</li>
						<li>C#</li>
					</ul>
				</li>
				<li class="topicCategory">Algorithms
					<ul class="dropdownTopics">
						<li>Quicksort</li>
						<li>Mergesort</li>
						<li>Depth First Search</li>
						<li>Breadth First Search</li>
					</ul>
				</li>
				<li class="topicCategory">Data Structures
					<ul class="dropdownTopics">
						<li>Stack</li>
						<li>Queue</li>
						<li>Linked List</li>
						<li>Heap</li>
						<li>Binary Search Tree</li>
						<li>Graph</li>
					</ul>
				</li>				
			</ul>
		</div>

		<article class="lesson">
			<img src="http://placehold.it/230x100" alt="Placeholder for Lesson Image" class="lessonImage" />
			<img src="http://placehold.it/60x60" alt="Author Icon" class="authorImage" />
			<h1 class="lessonTitle"><a href="controller.php?action=lesson&id=0">Lesson Title</a></h1>
			<p class="lessonExcerpt">
				Phasellus magna auctor non mid in nec elementum velit elit nunc pulvinar scelerisque nisi tristique, arcu platea nunc! Augue pid! 
				Aenean enim nascetur nunc, montes porttitor ut tortor nec placerat ultricies cursus, ac penatibus urna vel...
			</p>
			<div class="lessonTopics">
				<a href="">Python</a> | <a href="">Quicksort</a>
			</div>
		</article>
	</article>

	<?php
}

// Display a particular lesson
// Currently just a placeholder to show how things will work
function displayLesson($id) {
	?>
	<article id="fullLesson">
		<div id="lessonInfo">
			<h1>Lesson Title</h1>
			<h2>By <a href="">Lesson Author</a></h2>
		</div>
		<h3>Topics: <a href="">Python</a>, <a href="">Quicksort</a></h3>

		<div id="lessonContent">
			<p>
			Et aliquet dis mus? Tristique, urna mus mid nec ac turpis quis, ac risus mus mus in, phasellus sed sagittis montes pulvinar, dis urna, arcu vel, vel odio ac lundium! 
			Cum rhoncus vel scelerisque! Odio a. Magna in lacus non velit diam, vel magna placerat in pulvinar et. Mattis, integer, lectus hac ac! Elit placerat nec, dis eros pellentesque aliquet? 
			Augue mid pulvinar scelerisque adipiscing turpis placerat tincidunt, sagittis elit ultricies platea, dignissim. 
			Amet in nascetur montes pulvinar dis vel dolor turpis ac pulvinar sed enim mattis aliquet scelerisque ac purus quis porttitor tempor ridiculus, 
			parturient augue et integer sociis, dapibus vut tortor aenean scelerisque scelerisque pulvinar dapibus, mus dapibus mattis eros? Rhoncus scelerisque porttitor ac. Enim mattis non sed.
			</p>

			<img src="http://placehold.it/600x200" alt="Diagram" />

			<p>
			Pulvinar, quis! Facilisis, enim in! Lectus risus, cras tempor, ridiculus magnis! Integer cras platea augue vut natoque lectus. 
			Risus velit in mattis aliquet pulvinar ac adipiscing lundium velit rhoncus? Sagittis vut elit sed odio ac? Ultrices montes, sit in? Aenean tincidunt? 
			In, turpis tortor? Ac ac mid, ac ridiculus auctor ultrices in pellentesque in eros? 
			Lorem auctor, pellentesque magnis? Nunc nisi porta nec scelerisque pellentesque, urna lectus enim scelerisque mauris purus, enim augue est, montes! Pulvinar quis urna porttitor pulvinar. 
			Elementum purus tristique nunc, augue tincidunt ultrices. Mus ac mus rhoncus, natoque non? Augue est ridiculus mattis ac! Tincidunt? Rhoncus ut? Arcu ut? 
			Amet dolor mattis nisi mattis lundium amet? Pid dictumst porta dolor mus tempor penatibus velit pulvinar.
			</p>

			<p>
			Amet placerat nec nisi sagittis. Adipiscing sociis, parturient ultrices ut, augue. Pulvinar facilisis, proin etiam. In urna? 
			Penatibus mus montes cras dictumst porta? Turpis hac amet lundium enim magnis? Integer mus ac, nascetur mus mattis pid cursus facilisis, tincidunt, ultricies pellentesque mattis scelerisque, nec. 
			Et porta! Sit! Arcu integer turpis, vut augue! Augue, adipiscing porta proin adipiscing dolor, nisi, 
			ac vut augue sed placerat ut sed penatibus ac pulvinar odio aliquet hac porttitor dapibus auctor augue dis? 
			Montes! Est sagittis, odio dis tincidunt mid porttitor ultricies nunc rhoncus adipiscing? Risus duis. Tincidunt! 
			Purus porttitor adipiscing, augue dictumst facilisis tempor? Nunc dolor in ut ut ac in sed duis rhoncus tristique dictumst amet platea! Nec, enim? Mattis egestas ut aliquet.	
			</p>
		</div>

	</article>
	<?php
}

?>
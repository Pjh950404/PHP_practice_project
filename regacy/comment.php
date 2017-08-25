<?php
	$sql = 'select * from comment_free where co_no=co_order and b_no=' . $bNo;
	$result = $db->query($sql);

	$query = $db->query("SELECT user_id, username, email, password FROM tbl_users WHERE email='{$_SESSION['userSession_email']}' ");
	$row = $query->fetch_array();
	
?>
<div id="commentView" class="comments-container">
	<form action="comment_update.php" method="post">
		<input type="hidden" name="bno" value="<?php echo $bNo?>">
		<?php
			while($row = $result->fetch_assoc() ) {
		?>
		<ul id="oneDepth" class="comments-list">
			<li>
				<div id="co_<?php echo $row['co_no']?>" class="commentSet comment-main-level">
					<div class="commentInfo">
						<div class="commentId comment-avatar"><img src="http://plugins.krajee.com/uploads/default_avatar_male.jpg" alt=""></div>
						<div class="comment-box">
							<div class="comment-head">
							<h6 class="comment-name by-author"><span class="coId"><?php echo $row['co_id']?></span></h6>
						<div class="commentBtn">
							<?php
							if($row['co_id'] == $_SESSION['userSession_email'])
							{
							?>
								<a href="#" class="comt write ">댓글</a>
								<a href="#" class="comt modify">수정</a>
								<a href="#" class="comt delete">삭제</a>
							<?php
							}
							else
							{
							?>
								<a href="#" class="comt write ">댓글</a>
							<?php
							}
							?>
						</div>
					</div>
					<div class="commentContent"><?php echo $row['co_content']?></div>
				</div>
				<?php
					$sql2 = 'select * from comment_free where co_no!=co_order and co_order=' . $row['co_no'];
					$result2 = $db->query($sql2);

					while($row2 = $result2->fetch_assoc()) {
				?>
				<ul id="twoDepth" class="comments-list reply-list">
					<li>
						<div id="co_<?php echo $row2['co_no']?>" class="commentSet">
							<div class="commentInfo">
								<div class="comment-avatar"><img src="http://plugins.krajee.com/uploads/default_avatar_male.jpg" alt=""></div>
								<div class="comment-box">
									<div class="comment-head">
									<h6 class="comment-name by-author"><?php echo $row2['co_id']?></h6>
								<div class="commentBtn">
										<a href="" class="comt modify">수정</a>
										<a href="" class="comt delete">삭제</a>
									
									<?php
									if(!$row['co_id'] == $_SESSION['userSession_email'])
									{
									?>
										
									<?php
									}
									
									?>
									
								</div>
							</div>
							<div class="commentContent"><?php echo $row2['co_content'] ?></div>
						</div>
					</li>
				</ul>
				<?php
					}
				?>
			</li>
		</ul>
		<?php } ?>
	</form>
</div>
<br>

<div class="comments">
<div class="container">
	<div class="row">
		<form action="comment_update.php" method="post">
		<input hidden="text" name="bno" value="<?php echo $bNo?>">
                <div class="row">
                	<div class="col-md-6">
                  		<div class="form-group">
                        	<input type="text" class="form-control" name="coId" autocomplete="off" id="coId" value="<?php echo $_SESSION['userSession_email']; ?>" readonly>
                  		</div>
                  	</div>
                    	<div class="col-md-6">
                  			<div class="form-group">
								<?php
						  		$query = $db->query("SELECT user_id, username, email, password FROM tbl_users WHERE email='{$_SESSION['userSession_email']}' ");
								$row = $query->fetch_array(); 
								?>
                            	<input type="hidden" class="form-control" name="coPassword" autocomplete="off" id="coPassword" value="<?php echo $row['password'] ?> ">
                  			</div>
                  		</div>
                  	</div>
					  
                  	<div class="row">
                  		<div class="col-md-12">
                  			<div class="form-group">
                            	<textarea class="form-control textarea" rows="3" name="coContent" id="coContent" placeholder="댓글을 입력해주세요."></textarea>
                  			</div>
                  		</div>
                    </div>
                    <div class="row">
                    	<div class="col-md-12">
                  			<div class="btnSet">
								<input type="submit" value="코멘트 작성" class="btn btn-primary pull-right"> 
							</div>
                  		</div>
					</div>
				</div>
		</form>
	</div>
</div>
</div>

<script>
	$(document).ready(function () {
		var commentSet = '';
		var action = '';
		$('#commentView').delegate('.comt', 'click', function () {
			//현재 작성 내용을 변수에 넣고, active 클래스 추가.
			commentSet = $(this).parents('.commentSet').html();
			$(this).parents('.commentSet').addClass('active');

			//취소 버튼
			var commentBtn = '<a href="#" class="addComt cancel">취소</a>';

			//버튼 삭제 & 추가
			$('.comt').hide();
			$(this).parent('.commentBtn').append(commentBtn);

			//commentInfo의 ID를 가져온다.
			var co_no = $(this).parents('.commentSet').attr('id');
			
			//전체 길이에서 3("co_")를 뺀 나머지가 co_no
			co_no = co_no.substr(3, co_no.length);

			var addOption = '<input type="hidden" name="co_no" value="' + co_no + '">';

			//변수 초기화
			var comment = '';
			var coId = '';
			var coContent = '';

			var tempPassword= "<?php echo $row['password']; ?>"

			

			if($(this).hasClass('write')) {
				//댓글 쓰기
				action = 'w';
				//ID 영역 출력
				coId = '<input type="text" name="coId" id="coId" value="">';

			} else if($(this).hasClass('modify')) {
				//댓글 수정
				action = 'u';
				$(this).parents('.commentBtn');

				var modifyParent = $(this).parents('.commentSet');
				var coId = modifyParent.find('.coId').text();
				var coContent = modifyParent.find('.commentContent').text();

			} else if($(this).hasClass('delete')) {
				//댓글 삭제
				action = 'd';

			}

				comment += '<div class="writeComment">';
				comment += '	<input type="hidden" name="w" value="' + action + '">';
				comment += addOption;
				comment += '	<table>';
				comment += '		<tbody>';
				if(action !== 'd') {
					comment += '			<tr>';
					comment += '				<th scope="row"><label for="coId">아이디</label></th>';
					comment += '				<td>' + coId + '</td>';
					comment += '			</tr>';
				}
				
				/* comment += '			<tr>';
				comment += '				<th scope="row">';
				comment += '			<label for="coPassword">비밀번호</label></th>';
				comment += '			</tr>'; */
				// 비밀번호 입력구간을 히든 타입으로 설정. 삭제창을 누르면 바로 삭제가 가능하게끔.(본인인지 확인만)
				comment += '				<td><input type="hidden" name="coPassword" id="coPassword" value ="'+tempPassword +'" ></td>';

				if(action !== 'd') {
					comment += '			<tr>';
					comment += '				<th scope="row"><label for="coContent">내용</label></th>';
					comment += '				<td><textarea name="coContent" id="coContent">' + coContent + '</textarea></td>';
					comment += '			</tr>';
				}
				comment += '		</tbody>';
				comment += '	</table>';
				comment += '	<div class="btnSet">';
				comment += '		<input type="submit" value="확인">';
				comment += '	</div>';
				comment += '</div>';

				$(this).parents('.commentSet').after(comment);
			return false;
		});

		$('#commentView').delegate(".cancel", "click", function () {
			if(action == 'w') {
				$('.writeComment').remove();
			} else if(action == 'u') {
				$('.writeComment').remove();
			} else if(action == 'd'){
				$('.writeComment').remove();
			}
				$('.commentSet.active').removeClass('active');
				$('.addComt').remove();
				$('.comt').show();
			return false;
		});
	});
</script>

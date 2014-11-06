#include <stdio.h>
#include <string.h>
#include <mysql/mysql.h>
#include <time.h>
#include "AllatAPI.h"

int main(int argc, char *argv[]) {
	

	    MYSQL *connect; //연결설정
//-----------------------------------결과 반환시 날것과 가공 통조림이 필요---------
    MYSQL_ROW row_1; 
    MYSQL_RES *res_1;
    MYSQL_ROW row_2; 
    MYSQL_RES *res_2;
	MYSQL_ROW row_3; 
    MYSQL_RES *res_3;
    MYSQL_ROW row_4; 
    MYSQL_RES *res_4;

//------------직접 쿼리를 넣기보다 sprint가 안전하겠지 ㅎㅎ--------------------
     char qbuf_1[200];
     char qbuf_2[200];
     char qbuf_3[200];
     char qbuf_4[200];
     char qbuf_5[200];
     char qbuf_6[200];
     char qbuf_7[200];
	 char qbuf_8[200];

    

//------------------------DB접속------------------------------
    connect = mysql_init(NULL); 
    connect = mysql_real_connect(connect,"localhost","rasbas","RASBAS!@#$1234","rasbas",0,NULL,0);





	// InputParam 변수선언
	ALLATAPI_DATA InputParam;
	char sMemberId[12+1];
	char sMemberKey[32+1];
	char sMsgCd[8+1];
	char sSendNo[15+1];
	char sRecvNo[15+1];
	char sContent[80+1];
	char sCutYn[1+1];
	char sTestYn[1+1];

	// OututParam 변수선언
	char OutputParam[8191+1];
	char sRetCd[4+1];
	char sRetMsg[400+1];
	char sRetCnt[10+1];
	char sSendKey[14+1];

	// InputParam 초기화
	memset(sMemberId, 	0, sizeof(sMemberId));
	memset(sMemberKey,	0, sizeof(sMemberKey));
	memset(sMsgCd,		0, sizeof(sMsgCd));
	memset(sSendNo,		0, sizeof(sSendNo));
	memset(sRecvNo,		0, sizeof(sRecvNo));
	memset(sContent,	0, sizeof(sContent));
	memset(sCutYn,		0, sizeof(sCutYn));
	memset(sTestYn,		0, sizeof(sTestYn));

    sprintf(qbuf_1, "SELECT * FROM sms_id");
    mysql_query(connect,qbuf_1);
	res_1=mysql_store_result(connect);
	row_1=mysql_fetch_row(res_1);
	strcpy(sMemberId,row_1[0]);
	strcpy(sMemberKey,row_1[1]);

	strcpy(sMsgCd,	   "SMS_1010");

    sprintf(qbuf_2, "SELECT * FROM send_num");
    mysql_query(connect,qbuf_2);
	res_2=mysql_store_result(connect);
	row_2=mysql_fetch_row(res_2);
	strcpy(sSendNo,row_2[0]);

    sprintf(qbuf_3, "SELECT * FROM recv_num");
    mysql_query(connect,qbuf_3);
	res_3=mysql_store_result(connect);
	row_3=mysql_fetch_row(res_3);
	strcpy(sRecvNo,row_3[0]);

    sprintf(qbuf_4, "SELECT * FROM machin_name");
    mysql_query(connect,qbuf_4);
	res_4=mysql_store_result(connect);
	row_4=mysql_fetch_row(res_4);
	char message[200];
	sprintf(message, "<--경고--> \n %s 의 정전이 확인되었습니다.", row_4[0]);
	strcpy(sContent,message);

	strcpy(sCutYn,	   "N");
	strcpy(sTestYn,	   "N");

	// InputParam Setting
	initEnc(InputParam);
	setValue(InputParam, "member_id", sMemberId);
	setValue(InputParam, "member_key", sMemberKey);
	setValue(InputParam, "msg_cd", sMsgCd);
	setValue(InputParam, "send_no", sSendNo);
	setValue(InputParam, "recv_no", sRecvNo);
	setValue(InputParam, "content", sContent);
	setValue(InputParam, "cut_yn", sCutYn);
	setValue(InputParam, "test_yn", sTestYn);

	// 올앳과 통신 후 결과값 받기
	if( reqCall(InputParam,OutputParam) != 0 ) {
		// 통신에러처리
	} else {
		// 결과코드
		getValue(OutputParam, "ret_cd=", sRetCd, sizeof(sRetCd));
		// 결과메시지
		getValue(OutputParam, "ret_msg=", sRetMsg, sizeof(sRetMsg));

		if( strcmp(sRetCd,"0000") == 0 ) {
			// 잔여건수
			getValue(OutputParam, "ret_cnt=", sRetCnt, sizeof(sRetCnt));
			// 발송번호
			getValue(OutputParam, "send_key=", sSendKey, sizeof(sSendKey) );
			printf("=============== 정전 발송 성공  ===============\n");
			printf("결과코드   : %s\n", sRetCd);
			printf("결과메세지 : %s\n", sRetMsg);
			printf("잔여건수   : %s\n", sRetCnt);
			printf("발송번호   : %s\n", sSendKey);
            printf("발송내용   : %s\n", sContent);
		} else {
			printf("=============== 실패 ===============\n");
			printf("결과코드   : %s\n", sRetCd);
			printf("결과메세지 : %s\n", sRetMsg);        
			
		}                    
	}


	time_t ltime; //현제시간을 구하는 식. sold_book에 같이 입력된다.
    struct tm *today;

    time(&ltime);
    today = localtime(&ltime);
    

	sprintf(qbuf_7, "INSERT INTO rec (blackoutstart,blackoutstop) VALUES('%04d-%02d-%02d  %02d:%02d:%02d','0')", today->tm_year + 1900, today->tm_mon + 1, today->tm_mday, today->tm_hour, today->tm_min, today->tm_sec);
    mysql_query(connect, qbuf_7);



	mysql_free_result(res_1);
//    mysql_free_result(res_3);
//    mysql_free_result(res_4);
    mysql_close(connect);


	return 0;
}

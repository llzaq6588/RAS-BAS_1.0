#include <stdio.h>
#include <string.h>
#include <mysql/mysql.h>
#include <wiringPi.h> 

#define LED1 22 //����� ������ ������� ��� ������
#define LED2 23 //������ ������ ���� ��� ������
#define SW   25 //����ġ ����  ����Ŀ�÷��� �ִ� �ڸ��̴�.

int main(void) 
{ 

		    MYSQL *connect; //���ἳ��
//-----------------------------------��� ��ȯ�� ���Ͱ� ���� �������� �ʿ�---------
    MYSQL_ROW row_1;
    MYSQL_RES *res_1;
//    MYSQL_ROW row_2;
//    MYSQL_RES *res_2;
	MYSQL_ROW row_3;
    MYSQL_RES *res_3;
//    MYSQL_ROW row_4;
//    MYSQL_RES *res_4;
	MYSQL_ROW row_5;
    MYSQL_RES *res_5;

//------------���� ������ �ֱ⺸�� sprint�� �����ϰ��� ����--------------------
     char qbuf_1[200]; //
     char qbuf_2[200];//
     char qbuf_3[200];//
     char qbuf_4[200];//
     char qbuf_5[200];//
//     char qbuf_6[200];//
//     char qbuf_7[200];
//	 char qbuf_8[200];

    

//------------------------DB����------------------------------
    connect = mysql_init(NULL); 
    connect = mysql_real_connect(connect,"localhost","rasbas","RASBAS!@#$1234","rasbas",0,NULL,0);


  if(wiringPiSetupGpio() == -1)  
    return 1; 

  pinMode(LED1, OUTPUT);  
  pinMode(LED2, OUTPUT);  

  pinMode(SW, INPUT);
  
	char temp[10];
    sprintf(qbuf_1, "SELECT * FROM temp");
    mysql_query(connect,qbuf_1);
    res_1=mysql_store_result(connect);
    row_1=mysql_fetch_row(res_1);
    strcpy(temp,row_1[0]);




  while(1) 
  { 
    digitalWrite(LED1, 0); 
    digitalWrite(LED2, 0);  

	if(digitalRead(SW) == 1)  
    { 
      digitalWrite(LED1, 1); 
      digitalWrite(LED2, 0); 
	  if(strcmp(temp, "1") == 0)
		{
			system("/var/rasbas/blackoutstop");
			sprintf(qbuf_2, "UPDATE temp SET temp = '0' WHERE temp = '1'");
    		mysql_query(connect,qbuf_2);
		    sprintf(qbuf_3, "SELECT * FROM temp");
		    mysql_query(connect,qbuf_3);
		    res_3=mysql_store_result(connect);
		    row_3=mysql_fetch_row(res_3);
		    strcpy(temp,row_3[0]);
		}
      delay(1000); 
    } 


	if(digitalRead(SW) == 0)  
    { 
      digitalWrite(LED1, 0); 
      digitalWrite(LED2, 1); 
	  if(strcmp(temp, "0") == 0)
		{
		    system("/var/rasbas/blackoutstart");
			sprintf(qbuf_4, "UPDATE temp SET temp = '1' WHERE temp = '0'");
		    mysql_query(connect,qbuf_4);
		    sprintf(qbuf_5, "SELECT * FROM temp");
		    mysql_query(connect,qbuf_5);
		    res_5=mysql_store_result(connect);
		    row_5=mysql_fetch_row(res_5);
		    strcpy(temp,row_5[0]);
		}
      delay(1000); 
    } 

  } 
  return 0 ; 
} 

#include <stdio.h>
#include <string.h>
#include <unistd.h>
#include <mysql/mysql.h>


int main()
{
    char qbuf_0[200];

    MYSQL *connect;
    connect = mysql_init(NULL);
    connect = mysql_real_connect(connect,"localhost","rasbas","RASBAS!@#$1234","rasbas",0,NULL,0);


    mysql_query(connect, "DROP TABLE admin"); //테이블 admin을 우선 drop시킨다. 기존 비밀번호를 잃어버렸다면 새로 설정할 수 있다.
    mysql_query(connect, "CREATE TABLE admin(username text, password text)");

    system("clear");
    printf("\n\n\n     ============================================");
    printf("\n     [                                          ]");
    printf("\n     [          RAS-BAS 1.0 관리자 등록         ]");
    printf("\n     [                                          ]");
    printf("\n     [  본 프로그램은 보안을 위해 ROOT 계정에서 ]");
    printf("\n     [  작동되는 것을 추전드리는 바입니다.      ]");
    printf("\n     [                                          ]");
    printf("\n     [  아!! 비밀번호는 보이지 않아도 입력되니  ]");
    printf("\n     [  놀라지 마시길.. ^^?                     ]");
    printf("\n     [                                          ]");
    printf("\n     ============================================");
    printf("\n\n     계속하시려면 ENTER을 눌러주세요.");
    char stay[2];
    gets(stay);
        
    char ID[20];
    char PW1[20];
    char PW2[20];

    system("clear");
    printf("\n\n     관리자 ID : ");
    scanf("%s", ID);
    printf("\n\n     패스워드는 보이지 않습니다. \n");
    const char *prompt = "\n     관리자 PW : ";
    strcpy(PW1, getpass(prompt));
    const char *prompt2 = "\n     다시 입력해주세요 : ";
    strcpy(PW2, getpass(prompt2));

    if(!strcmp(PW1, PW2) == 0)
    {
    while(!strcmp(PW1, PW2) == 0)
    {
        system("clear");

        printf("\n\n     비밀번호가 맞지 않습니다. 다시 입력해주세요. ㅎㅎㅎ");
        printf("\n\n     관리자 ID : ");
        scanf("%s", ID);
        printf("\n\n     패스워드는 보이지 않습니다. \n");
        const char *prompt3 = "\n     관리자 PW : "; //getpass는 입력되면서 보이지 않게 하는 효과를 가지고 있다.
        strcpy(PW1, getpass(prompt3));
        const char *prompt4 = "\n     다시 입력해주세요 : ";
        strcpy(PW2, getpass(prompt4));
    }
    }
   
    sprintf(qbuf_0, "INSERT INTO admin (username, password) VALUES ('%s', SHA('%s'))", ID, PW1);
    mysql_query(connect, qbuf_0);

    system("clear");

    
    printf("\n\n\n     ============================================");
    printf("\n     [                                          ]");
    printf("\n     [     관리자 계정 등록을 완료하였습니다.   ]");
    printf("\n     [                                          ]");
    printf("\n     [               관리자 등록 ID : %s    ]", ID);
    printf("\n     [                                          ]");
    printf("\n     ============================================ \n\n\n");

    return 0;
}



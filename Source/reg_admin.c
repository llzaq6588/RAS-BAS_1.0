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


    mysql_query(connect, "DROP TABLE admin"); //���̺� admin�� �켱 drop��Ų��. ���� ��й�ȣ�� �Ҿ���ȴٸ� ���� ������ �� �ִ�.
    mysql_query(connect, "CREATE TABLE admin(username text, password text)");

    system("clear");
    printf("\n\n\n     ============================================");
    printf("\n     [                                          ]");
    printf("\n     [          RAS-BAS 1.0 ������ ���         ]");
    printf("\n     [                                          ]");
    printf("\n     [  �� ���α׷��� ������ ���� ROOT �������� ]");
    printf("\n     [  �۵��Ǵ� ���� �����帮�� ���Դϴ�.      ]");
    printf("\n     [                                          ]");
    printf("\n     [  ��!! ��й�ȣ�� ������ �ʾƵ� �ԷµǴ�  ]");
    printf("\n     [  ����� ���ñ�.. ^^?                     ]");
    printf("\n     [                                          ]");
    printf("\n     ============================================");
    printf("\n\n     ����Ͻ÷��� ENTER�� �����ּ���.");
    char stay[2];
    gets(stay);
        
    char ID[20];
    char PW1[20];
    char PW2[20];

    system("clear");
    printf("\n\n     ������ ID : ");
    scanf("%s", ID);
    printf("\n\n     �н������ ������ �ʽ��ϴ�. \n");
    const char *prompt = "\n     ������ PW : ";
    strcpy(PW1, getpass(prompt));
    const char *prompt2 = "\n     �ٽ� �Է����ּ��� : ";
    strcpy(PW2, getpass(prompt2));

    if(!strcmp(PW1, PW2) == 0)
    {
    while(!strcmp(PW1, PW2) == 0)
    {
        system("clear");

        printf("\n\n     ��й�ȣ�� ���� �ʽ��ϴ�. �ٽ� �Է����ּ���. ������");
        printf("\n\n     ������ ID : ");
        scanf("%s", ID);
        printf("\n\n     �н������ ������ �ʽ��ϴ�. \n");
        const char *prompt3 = "\n     ������ PW : "; //getpass�� �ԷµǸ鼭 ������ �ʰ� �ϴ� ȿ���� ������ �ִ�.
        strcpy(PW1, getpass(prompt3));
        const char *prompt4 = "\n     �ٽ� �Է����ּ��� : ";
        strcpy(PW2, getpass(prompt4));
    }
    }
   
    sprintf(qbuf_0, "INSERT INTO admin (username, password) VALUES ('%s', SHA('%s'))", ID, PW1);
    mysql_query(connect, qbuf_0);

    system("clear");

    
    printf("\n\n\n     ============================================");
    printf("\n     [                                          ]");
    printf("\n     [     ������ ���� ����� �Ϸ��Ͽ����ϴ�.   ]");
    printf("\n     [                                          ]");
    printf("\n     [               ������ ��� ID : %s    ]", ID);
    printf("\n     [                                          ]");
    printf("\n     ============================================ \n\n\n");

    return 0;
}



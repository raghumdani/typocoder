#include <stdio.h> 

int main() { 
    int t,flag;
    long int x;
    scanf("%d",&t);
    for(int i=1;i<=t;i++)
    {   
        flag=1;
         scanf("%ld",&x);
          int y= sqrt(x);
          for(int j=2;j<=y;j++)
          {
              if(x%j==0)
              {
                  flag=0;
               printf("\nNO\n");
               break;
              }
          }
          if(flag!=0)
          printf("\nYES\n");
    }
	
	return(0);
}
#include <stdio.h> 

int main() { 
      int t,flag;
    long int x;
    scanf("%d",&t);
     int a[t],b[t],c[t];
    for(int i=0;i<t;i++)
    {  scanf("%ld",&a[i]);
    c[i]=1;
    }
    for(int i=0;i<t;i++)
    {
        flag=1;
        b[i]=1;
        
        // scanf("%ld",&x);
          int y= sqrt(a[i]);
          for(int j=2;j<=y;j++)
          {
              if(a[i]%j==0)
              {
                  flag=0;
                  b[i]=0;
                  c[i]++;
             // printf("\nNO\n");
               break;
              }
          }
          c[i]=a[i]-c[i];
          //if((a[i]==0)||(a[i]==1))
        //  printf("\nNO\n");
       // b[i]=0;
          //else if(flag!=0)
          //printf("\nYES\n");
         // b[i]=1;
    }
	 for(int i=0;i<t;i++)
    { // if(b[i]==1)
        //printf("\nYES");
       // else
       if(c[i]>=0)
        printf("\n%ld",c[i]);
        else
        printf("\n0");
    }

	return(0);
}
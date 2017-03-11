#include <stdio.h> 
#include<stdlib.h>
int passes=0;
int main() { 
    int N,i,*arr,j;
   
    scanf("%d",&N);
     arr=(int *)malloc(N*sizeof(int));
    for(i=0;i<N;i++)
     scanf("%d",&arr[i]);
     for(i=0;i<N;i++)
       {
           for(j=i;;j=j+1%N)
           {
               if(arr[j]>arr[i])
                 break;
                 else
                   passes++;
           }
       }
       printf("%d\n",passes);
    return(0);
}
#include <stdio.h> 

int main() { 
    
    int t,n,i,j=0,k,p,h;
    scanf("%d",&t);
    for(i=0;i<t;i++){
        scanf("%d",&n);
        while(n!=0){
            k=n%10;
            n=n/10;
            a[j++]=k;
        }
        p=1;
        for(h=0;h<j;h++){
            p*=a[h];
        }
        printf("%d\n",p);
    }
    
	return(0);
}